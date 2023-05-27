module.exports = function (shipit) {
    // Load shipit-deploy tasks
    require('shipit-deploy')(shipit)

    shipit.initConfig({
        default: {
            user: 'bitnami'
        },
        'development': {
            servers: ['bitnami@54.255.224.203'],
            key: 'deploy/ec2-keys/jnto-dev.pem',
            deployTo: '/opt/bitnami/apache2/htdocs/abb/current'
        },
        'production': {
            servers: ['ec2-user@13.251.188.98'],
            key: 'deploy/ec2-keys/jnto-prod.pem',
            deployTo: '/var/www/abb/current'
        }
    })

    /**
     * VERY IMPORTANT !!!
     * deploy Vue AFTER Laravel
     * when deploy Laravel, public folder on server will be empty again
     */

    shipit.task('vue:deploy', async () => {
        // remove old build
        await shipit.local('cd public && rm -rf assets css files fonts images js')

        // build source
        await shipit.local('yarn mix')

        // Zip the public folder into public.zip package
        await shipit.local('zip -r public.zip public')

        // Copy public.zip to server[s]
        await shipit.local(`scp -i ${shipit.config.key} public.zip ${shipit.config.servers}:${shipit.config.deployTo}`)

        // remove zip file on local, we dont need it anymore
        await shipit.local(`rm -rf public.zip`)

        // On server, remove old public files
        await shipit.remote(`rm -rf ${shipit.config.deployTo}/public/*`)

        // On server, unzip the public.zip file then remove the zip package
        await shipit.remote(
            `cd ${shipit.config.deployTo} && unzip -o public.zip && rm public.zip && php artisan storage:link`
        )
    })
}
