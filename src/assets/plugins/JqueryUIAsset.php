<?php

namespace nadzif\bracket\assets\plugins;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class JqueryUIAsset
 *
 * @author  L Shaf <shafry2008@gmail.com>
 * @package nadzif\bracket\assets\plugins
 */
class JqueryUIAsset extends AssetBundle
{
    public $sourcePath = "@bower/jquery-ui";
    public $publishOptions = [
        "only" => ["/*.js"]
    ];
    public $js = [
        "jquery-ui" . (YII_ENV_DEV ? "" : ".min") . ".js"
    ];
    public $depends = [
        JqueryAsset::class
    ];
}