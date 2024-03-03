<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@gitlab.n2rtechnologies.com:rc21292/collab-marketplace.git');

add('shared_files', ['.env','public/.htaccess','public/blog/.htaccess','public/blog/wp-config.php','public/sitemap.xml','public/robots.txt']);
add('shared_dirs', ['storage','public/blog/wp-content/uploads']);
add('writable_dirs', ['storage','public/blog/wp-content/uploads']);

// Hosts

host('production')
    ->set('hostname','15.236.196.113' )
    ->set('branch', 'main')
    ->set('remote_user', 'ubuntu')
    ->set('deploy_path', '/var/www/html');

host('staging')
    ->set('hostname','38.242.196.238' )
    ->set('branch', 'development')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/php81/collab')
    ->set('keep_releases', 2);
// Hooks
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'npm:install',
    'npm:run:prod',
    'deploy:publish',
]);

task('npm:run:prod', function () {
    cd('{{release_or_current_path}}');
    run('composer install');
    run('npm run build');
});

after('deploy:failed', 'deploy:unlock');
