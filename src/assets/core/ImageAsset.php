<?php

namespace nadzif\bracket\assets\core;

use nadzif\bracket\Bracket;
use yii\web\AssetBundle;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class ImageAsset extends AssetBundle
{
    public function init()
    {
        $bracket          = Bracket::getComponent();
        $this->sourcePath = $bracket->sourcePath . "/img";
        parent::init();
    }
}
