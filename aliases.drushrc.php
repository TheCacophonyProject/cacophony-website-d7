<?php
/**
 * @file yoursite.aliases.drushrc.php
 * Site aliases for [your site domain]
 * Place this file at ~/.drush/  (~/ means your home path)
 *
 * Usage:
 *   To copy the development database to your local site:
 *   $ drush sql-sync @yoursite.dev @yoursite.local
 *   To copy your local database to the development site:
 *   $ drush sql-sync @yoursite.local @yoursite.dev -structure-tables-key=common --no-ordered-dump --sanitize=0 --no-cache
 *   To copy the production database to your local site:
 *   $ drush sql-sync @yoursite.prod @yoursite.local
 *   To copy all files in development site to your local site:
 *   $ drush rsync @yoursite.dev:%files @yoursite.local:%files
 *   Clear the cache in production:
 *   $ drush @yoursite.prod clear-cache all
 *
 * You can copy the site alias configuration of an existing site into a file
 * with the following commands:
 *   $ cd /path/to/settings.php/of/the/site/
 *   $ drush site-alias @self --full --with-optional >> ~/.drush/mysite.aliases.drushrc.php
 */

/**
 * Local d6 target alias
 * Set the root and site_path values to point to your local site
 */
$aliases["dev"] = array (
  'root' => '/var/www/site/drupal7',
  'uri' => 'localhost',
  '#name' => 'dev',
  'path-aliases' => 
  array (
    '%dump-dir' => '/tmp',
  ),
  '#file' => '/home/vagrant/.drush/aliases.drushrc.php',
  'databases' => 
  array (
    'default' => 
    array (
      'default' => 
      array (
        'driver' => 'mysql',
        'username' => 'vagrant',
        'password' => 'vagrant',
        'port' => '',
        'host' => 'localhost',
        'database' => 'drupal7',
      ),
    ),
  ),
);

$aliases["prod"] = array (
  'root' => '/var/www/cacophony.org.nz-d7/drupal7',
  'uri' => 'cacophony.davelane.nz',
  '#name' => 'prod',
  'path-aliases' => 
  array (
    '%dump-dir' => '/tmp',
  ),
  'databases' => 
  array (
    'default' => 
    array (
      'default' => 
      array (
        'driver' => 'mysql',
        'username' => 'cacophony',
        'password' => 'YdzY<Z"VL$3{',
        'port' => '',
        'host' => 'localhost',
        'database' => 'cacophony',
        'prefix' => '',
      ),
    ),
  ),
  '#file' => '/home/vagrant/.drush/aliases.drushrc.php',
);

?>
