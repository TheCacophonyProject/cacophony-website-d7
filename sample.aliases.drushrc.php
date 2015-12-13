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
  'root' => '[full path to your Drupal core directory]',
  'uri' => 'localhost',
  '#name' => 'dev',
  'path-aliases' => 
  array (
    '%dump-dir' => '/tmp',
  ),
  '#file' => '[user dir path]/.drush/aliases.drushrc.php',
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
  'source-command-specific' => array (
    'sql-sync' => array (
      'no-cache' => TRUE,
      'structure-tables-key' => 'common',
    ),
  ),
  // No need to modify the following settings
  'command-specific' => array (
    'sql-sync' => array (
      'sanitize' => TRUE,
      'no-ordered-dump' => TRUE,
      'structure-tables' => array(
       // You can add more tables which contain data to be ignored by the database dump
        'common' => array('cache', 'cache_filter', 'cache_menu', 'cache_page', 'history', 'sessions', 'watchdog'),
      ),
    ),
  ),
);

$aliases["prod"] = array (
  'parent' =>  '@localhost',
  'root' => '[path to your Drupal core dir]',
  'uri' => '[URL for your production site]',
  'remote-user' => '[ssh username]',
  'remote-host' => '[name of host, possibly same as uri]',
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
        'username' => '[dbusername]',
        'password' => '[dbpassword]',
        'port' => '',
        'host' => 'localhost',
        'database' => '[dbname]',
        'prefix' => '',
      ),
    ),
  ),
  '#file' => '[path to user dir]/.drush/aliases.drushrc.php',
);

?>
