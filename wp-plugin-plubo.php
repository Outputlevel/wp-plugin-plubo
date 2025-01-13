<?php

/**
 * @wordpress-plugin
 * Plugin Name:       WpPluginPlubo
 * Plugin URI:        https://sirvelia.com/
 * Description:       A WordPress plugin made with PLUBO.
 * Version:           1.0.0
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       wp-plugin-plubo
 * Domain Path:       /languages
 * Update URI:        false
 * Requires Plugins:
 */

if (!defined('WPINC')) {
    die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('WPPLUGINPLUBO_NAME', 'wp-plugin-plubo');
define('WPPLUGINPLUBO_VERSION', '1.0.0');
define('WPPLUGINPLUBO_PATH', plugin_dir_path(__FILE__));
define('WPPLUGINPLUBO_BASENAME', plugin_basename(__FILE__));
define('WPPLUGINPLUBO_URL', plugin_dir_url(__FILE__));
define('WPPLUGINPLUBO_ASSETS_PATH', WPPLUGINPLUBO_PATH . 'dist/' );
define('WPPLUGINPLUBO_ASSETS_URL', WPPLUGINPLUBO_URL . 'dist/' );

// AUTOLOAD
if (file_exists(WPPLUGINPLUBO_PATH . 'vendor/autoload.php')) {
    require_once WPPLUGINPLUBO_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [WpPluginPlubo\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [WpPluginPlubo\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [WpPluginPlubo\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new WpPluginPlubo\Includes\Loader();
