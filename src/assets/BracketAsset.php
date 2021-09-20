<?php

namespace akupeduli\bracket\assets;

use akupeduli\bracket\assets\core\MainAsset;
use yii\web\AssetBundle;

class BracketAsset extends AssetBundle
{
    public $sourcePath = "@akupeduli/bracket/web";
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
