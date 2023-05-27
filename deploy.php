<?php
namespace Deployer;
require 'recipe/laravel.php';
// Project name
set('application', 'abb_jnto');
// Project repository
set('repository', 'gumivn@gumivn.git.backlog.com:/JNTO/jnto.git');
// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);
set('keep_releases', 2);
set('git_recursive', false);
//set('composer_action', 'update');
// Shared files/dirs between deploys
add('shared_files', [
    '.env',
    '.htaccess'
]);
add('shared_dirs', [
    'storage',
    'bootstrap/cache',
]);
// Writable dirs by web server
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);
// Hosts
foreach (glob('deploy/config/*.php') as $file) {
    require_once $file;
}

desc('Restart supervisor');
task('supervisor:reload', function () {
    $command = "sudo supervisorctl reread && sudo supervisorctl update && sudo supervisorctl reload";
    run($command);
    writeln('============= SUPERVISORD RELOADED =============');
});

desc('Remind to deploy Front End');
task('deploy:finishing', function () {
    writeln('=========== DEPLOY BACK END DONE !! ============');
    writeln('***');
    writeln('**');
    writeln('*');
    writeln('======= IT\'S TIME TO DEPLOY FRONT END !! =======');
});

desc('Upload Laravel Mix');
task('local:laravel_mix', function () {
    $selectedStage = Deployer::get()->getInput()->getArgument('stage');
    $cmd = 'deploy/' . $selectedStage . '.sh';
    run($cmd);
    writeln('=============== DEPLOY DONE !! =================');
})->local();

desc('Finishing deploy');
task('deploy:done', [
    'supervisor:reload',
    'deploy:finishing',
    'local:laravel_mix'
]);

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'artisan:view:clear',
    'artisan:cache:clear',
    'artisan:optimize',
    'artisan:config:cache',
    'deploy:clear_paths',
    'deploy:writable',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');

// Reload supervisor after deploy successfully
after('deploy', 'deploy:done');
