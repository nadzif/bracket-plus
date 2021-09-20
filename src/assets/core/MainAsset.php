<?php

namespace akupeduli\bracket\assets\core;

use akupeduli\bracket\assets\plugins\JqueryUIAsset;
use rmrevin\yii\fontawesome\AssetBundle as FABundle;
use rmrevin\yii\ionicon\AssetBundle as IonBundle;
use akupeduli\bracket\assets\plugins\PerfectScrollAsset;
use akupeduli\bracket\Bracket;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class MainAsset extends AssetBundle
{
    public $publishOptions = [
        'only' => [
            "css/*", "js/*"
        ]
    ];

    public $css = [
        "css/bracket.css",
    ];

    public $js = [
        // I make custom.js for custom use 
        // "js/bracket.js",
    ];

    public $depends = [
        YiiAsset::class,
        BootstrapPluginAsset::class,
        PerfectScrollAsset::class,
        FABundle::class,
        JqueryUIAsset::class,
        IonBundle::class
    ];

    public function init()
    {
        /** @var Bracket $bracket */
        $bracket          = Bracket::getComponent();
        $this->sourcePath = $bracket->sourcePath;
        if ($bracket->theme !== Bracket::THEME_DEFAULT) {
            $themeCss  = "css/bracket." . $bracket->theme;
            $themeCss .= (YII_ENV_DEV ? "" : ".min") . ".css";
            $this->css[] = $themeCss;
        }

        parent::init();
    }
}
