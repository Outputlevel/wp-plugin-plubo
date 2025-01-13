<?php

namespace WpPluginPlubo\Includes;

class Lyfecycle
{
    public static function activate($network_wide)
    {
        do_action('WpPluginPlubo/setup', $network_wide);
    }

    public static function deactivate($network_wide)
    {
        do_action('WpPluginPlubo/deactivation', $network_wide);
    }

    public static function uninstall()
    {
        do_action('WpPluginPlubo/cleanup');
    }
}
