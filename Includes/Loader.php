<?php

namespace WpPluginPlubo\Includes;

class Loader
{
    public function __construct()
    {
        $this->loadDependencies();

        add_action('plugins_loaded', [$this, 'loadPluginTextdomain']);
    }

    private function loadDependencies()
    {
        //FUNCTIONALITY CLASSES
        foreach (glob(WPPLUGINPLUBO_PATH . 'Functionality/*.php') as $filename) {
            $class_name = '\\WpPluginPlubo\Functionality\\' . basename($filename, '.php');
            if (class_exists($class_name)) {
                try {
                    new $class_name(WPPLUGINPLUBO_NAME, WPPLUGINPLUBO_VERSION);
                } catch (\Throwable $e) {
                    pb_log($e);
                    continue;
                }
            }
        }

        //ADMIN FUNCTIONALITY
        if( is_admin() ) {
            foreach (glob(WPPLUGINPLUBO_PATH . 'Functionality/Admin/*.php') as $filename) {
                $class_name = '\\WpPluginPlubo\Functionality\Admin\\' . basename($filename, '.php');
                if (class_exists($class_name)) {
                    try {
                        new $class_name(WPPLUGINPLUBO_NAME, WPPLUGINPLUBO_VERSION);
                    } catch (\Throwable $e) {
                        pb_log($e);
                        continue;
                    }
                }
            }
        }
    }

    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('wp-plugin-plubo', false, dirname(WPPLUGINPLUBO_BASENAME) . '/languages/');
    }
}
