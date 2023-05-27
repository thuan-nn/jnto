<?php
namespace Deployer;

# ssh bitnami@54.255.224.203 -i deploy/ec2-keys/jnto-dev.pem

host('54.255.224.203')
    ->set('http_user', 'bitnami')
    ->stage('development')
    ->user('bitnami')
    ->identityFile('deploy/ec2-keys/jnto-dev.pem')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->set('branch', 'develop')
    ->set('deploy_path', '/opt/bitnami/apache2/htdocs/abb');


