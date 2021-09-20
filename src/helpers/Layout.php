<?php

namespace akupeduli\bracket\helpers;

use akupeduli\bracket\Bracket;
use yii\helpers\Html;

class Layout
{
    /**
     * Retrieves Html options
     * @param string $tag given tag
     * @param array $options
     * @param boolean $asString if return as string
     * @return array|string
     */
    public static function getHtmlOptions($tag, $options = [], $asString = false)
    {
        $callback = sprintf('static::_%sOptions', strtolower($tag));

        $htmlOptions = call_user_func($callback, $options);

        return $asString ? Html::renderTagAttributes($htmlOptions) : $htmlOptions;
    }
    
    /**
     * Adds body tag options
     *
     * @param array $options given options
     *
     * @return string | array
     * @throws \yii\base\InvalidConfigException
     */
    private static function _bodyOptions($options)
    {
        /** @var Bracket $bracket */
        $bracket = Bracket::getComponent();
        if ($bracket->collapseMenu) {
            Html::addCssClass($options, "collapsed-menu with-subleft");
        }

        return $options;
    }
}
