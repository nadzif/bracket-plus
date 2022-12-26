<?php

namespace nadzif\bracket\assets\plugins;

use nadzif\bracket\assets\core\PluginAsset;
use yii\web\JqueryAsset;

/**
 * Class PerfectScrollAsset
 *
 * @author  L Shaf <shafry2008@gmail.com>
 * @package nadzif\bracket\assets\plugins
 */
class PerfectScrollAsset extends PluginAsset
{
    public $pluginName = "perfect-scrollbar";
    public $js = [
        "js/perfect-scrollbar.jquery" . (YII_ENV_DEV ? "" : ".min") . ".js"
    ];
    public $css = [
        "css/perfect-scrollbar" . (YII_ENV_DEV ? "" : ".min") . ".css"
    ];
    public $depends = [
        JqueryAsset::class
    ];
}
