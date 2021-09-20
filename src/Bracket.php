<?php

namespace akupeduli\bracket;

use akupeduli\bracket\assets\BracketAsset;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

/**
 *
 * @property string $assetPath
 * @property string $sourcePath
 */
class Bracket extends Component
{
    const THEME_DEFAULT = "default";
    const THEME_OREO = "oreo"; 
    const THEME_DARK = "dark";
    const THEME_SIMPLE = "simple-white";

    public static $componentName    = "bracket";
    public static $componentVersion = "1.0";

    /* must be filled */
    public $assetSourcePath; // path of source bracket plus
    public $assetBundleClass =  BracketAsset::class; // class of asset bundle (in case if you want to custom)
    
    /* custom option */
    public $collapseMenu = false;
    public $logo = '<a href=""><span>[</span>bracket <i>plus</i><span>]</span></a>';
    public $theme = self::THEME_DEFAULT;
    public $withFlashAlert = true;

    /**
     * @var string|array $sidebarConfig
     * @note if $sidebarConfig is string, will be read as path and require it
     */
    public $sidebarConfig = "@akupeduli/bracket/config/sidebar.php";
    public $sidebarFile = "@akupeduli/bracket/views/samples/sidebar";
    public $navbarFile = "@akupeduli/bracket/views/samples/navbar";

    public function init()
    {
        if (is_string($this->sidebarConfig)) {
            $this->sidebarConfig = \Yii::getAlias((string) $this->sidebarConfig);
        }
    }
    public static function getComponent()
    {
        try {
            return \Yii::$app->get(self::$componentName);
        } catch (InvalidConfigException $e) {
            $messageError = 'Component name should be set and named "' . self::$componentName . '".';
            throw new InvalidConfigException($messageError);
        }
    }

    public function getAssetPath()
    {
        return $this->assetSourcePath;
    }

    public function getSourcePath()
    {
        return $this->assetSourcePath;
    }

    public function registerAsset($view)
    {
        if ($this->assetSourcePath === null) {
            throw new InvalidConfigException('Please set $assetSourcePath of remark admin template');
        }
        if ($this->assetBundleClass === null) {
            throw new InvalidConfigException('Please set $assetBundleClass property.');
        }

        /** @var AssetBundle $assetBundleClass */
        $assetBundleClass = $this->assetBundleClass;
        $assetBundleClass::register($view);
    }
}
