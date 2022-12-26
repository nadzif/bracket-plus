<?php

namespace nadzif\bracket\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @Author: L Shaf
 * @Email : shafry2008@gmail.com
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $tag = "nav";
    public $options = ['class' => 'breadcrumb pd-0 mg-0 tx-12'];
    public $itemTemplate = "{link}\n";
    public $activeItemTemplate = "{link}\n";
    
    protected function renderItem($link, $template)
    {
        $encodeLabel = ArrayHelper::remove($link, 'encode', $this->encodeLabels);
        if (array_key_exists('label', $link)) {
            $label = $encodeLabel ? Html::encode($link['label']) : $link['label'];
        } else {
            throw new InvalidConfigException('The "label" element is required for each link.');
        }
        if (isset($link['template'])) {
            $template = $link['template'];
        }
        if (isset($link['url'])) {
            $options = $link;
            unset($options['template'], $options['label'], $options['url']);
            Html::addCssClass($options, "breadcrumb-item");
            $link = Html::a($label, $link['url'], $options);
        } else {
            $link = Html::tag("span", $label, ["class" => "breadcrumb-item active"]);
        }
    
        return strtr($template, ['{link}' => $link]);
    }
}