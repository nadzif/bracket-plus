<?php

namespace nadzif\bracket\assets\plugins;

use nadzif\bracket\assets\core\PluginAsset;

/**
 * Class SwitchButtonAsset
 *
 * @author  L Shaf <shafry2008@gmail.com>
 * @package nadzif\bracket\assets\plugins
 */
class SwitchButtonAsset extends PluginAsset
{
    public $pluginName = "jquery-switchbutton";
    public $css = [
        "jquery.switchButton.css"
    ];
    public $js = [
        "jquery.switchButton.js"
    ];
}