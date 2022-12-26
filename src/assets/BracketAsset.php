<?php

namespace nadzif\bracket\assets;

use nadzif\bracket\assets\core\MainAsset;
use yii\web\AssetBundle;

class BracketAsset extends AssetBundle
{
    public $sourcePath = "@nadzif/bracket/web";
    public $js = [
        "js/custom.js",
    ];
    public $css = [
        "css/style.css"
    ];
    public $depends = [
        MainAsset::class
    ];
}
