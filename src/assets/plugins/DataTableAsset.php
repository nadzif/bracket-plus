<?php

namespace akupeduli\bracket\assets\plugins;

use akupeduli\bracket\assets\core\PluginAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\JqueryAsset;

class DataTableAsset extends PluginAsset
{
    public $pluginName = "datatables";
    public $css = [
        "jquery.dataTables.css",
    ];
    public $js = [
        "jquery.dataTables.js",
    ];
    public $depends = [
        JqueryAsset::class,
        BootstrapPluginAsset::class
    ];
}
