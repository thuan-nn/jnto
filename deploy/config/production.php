<?php
namespace Deployer;

# ssh ec2-user@13.251.188.98 -i deploy/ec2-keys/jnto-prod.pem

host('13.251.188.98')
    ->set('http_user', 'apache')
    ->stage('production')
    ->user('ec2-user')
    ->identityFile('deploy/ec2-keys/jnto-prod.pem')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('branch', 'release/production')
    ->set('deploy_path', '/var/www/abb');

