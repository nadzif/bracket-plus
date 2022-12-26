<?php

namespace nadzif\bracket\assets\core;

use nadzif\bracket\Bracket;
use yii\base\InvalidConfigException;
use yii\web\AssetBundle;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class PluginAsset extends AssetBundle
{
    public $pluginName;

    public function __construct(array $config = [])
    {
        if ($this->pluginName === null) {
            throw new InvalidConfigException('pluginName must be set.');
        }

        $bracket          = Bracket::getComponent();
        $this->sourcePath = $bracket->assetPath . '/lib/' . $this->pluginName;

        parent::__construct($config);
    }
}
