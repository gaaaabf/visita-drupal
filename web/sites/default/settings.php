<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all environments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Skipping permissions hardening will make scaffolding
 * work better, but will also raise a warning when you
 * install Drupal.
 *
 * https://www.drupal.org/project/drupal/issues/3091285
 */
// $settings['skip_permissions_hardening'] = TRUE;

if (!empty($_ENV['PANTHEON_ENVIRONMENT'])) {
  switch ($_ENV['PANTHEON_ENVIRONMENT']) {
    case 'live':
      // Keys for production env.
      $config['config_split.config_split.dev_config']['status'] = FALSE;
      $config['config_split.config_split.stg_config']['status'] = FALSE;
      $config['config_split.config_split.prd_config']['status'] = TRUE;
      break;

    case 'test':
      // Keys for staging env.
      $config['config_split.config_split.dev_config']['status'] = FALSE;
      $config['config_split.config_split.stg_config']['status'] = TRUE;
      $config['config_split.config_split.prd_config']['status'] = FALSE;
      break;

    default:
      $config['config_split.config_split.dev_config']['status'] = TRUE;
      $config['config_split.config_split.stg_config']['status'] = FALSE;
      $config['config_split.config_split.prd_config']['status'] = FALSE; 
      // Key for dev and multidev envs.
      break;
  }
}

$settings['config_sync_directory'] = 'sites/default/config/main_config';

/**
 * If there is a local settings file, then include it.
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}
