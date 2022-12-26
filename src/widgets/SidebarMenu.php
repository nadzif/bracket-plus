<?php

namespace nadzif\bracket\widgets;

use rmrevin\yii\ionicon\Ion;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;

/**
 * Class SidebarMenu
 *
 * @author  L Shaf <shafry2008@gmail.com>
 * @package nadzif\bracket\widgets
 */
class SidebarMenu extends Menu
{
    public $activateParents = true;
    public $linkTemplate = "<a {attr}>{icon}{label}</a>";
    public $submenuTemplate = "\n<ul class='br-menu-sub'>\n{items}\n</ul>\n";
    
    const _ICON_SIZE_20 = "tx-20";
    const _ICON_SIZE_24 = "tx-24";
    
    public function init()
    {
        $this->_initOption();
        parent::init(); // TODO: Change the autogenerated stub
    }

    protected function renderItems($items, $level = 1)
    {
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $item["level"] = $level;
            $class = [];
            
            if ($level == 1) {
                $class[] = "br-menu-item";
            } else {
                $class[] = "sub-item";
            }

            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }

            if (!empty($class)) {
                Html::addCssClass($options, $class);
            }
    
            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $menu .= strtr($this->submenuTemplate, [
                    '{items}' => $this->renderItems($item['items'], $level + 1),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }

        return implode(PHP_EOL, $lines);
    }
    
    protected function renderItem($item)
    {
        $template = ArrayHelper::getValue($item, "template", $this->linkTemplate);
        $labelText = ArrayHelper::remove($item, "label", "");
        $iconImage = ArrayHelper::remove($item, "icon", "");
        $label = Html::tag("span", $labelText, ["class" => "menu-item-label"]);
        
        $icon = $iconImage;
        if (is_array($iconImage)) {
            $iconName = ArrayHelper::remove($iconImage, 'name', '');
            $iconSize = ArrayHelper::remove($iconImage, "size", self::_ICON_SIZE_20);
            
            Html::addCssClass($iconImage, ["menu-item-icon", "icon", $iconSize]);

            $icon = Ion::icon($iconName)->addCssClass($iconImage["class"]);
        }
    
        return strtr($template, [
            "{attr}" => $this->_formatLinkAttr($item),
            "{icon}" => $icon,
            "{label}" => $label
        ]);
    }
    
    private function _formatLinkAttr($item)
    {
        $options = [
            "class" => "",
            "aria-expanded" => false,
            "href" => ArrayHelper::remove($item, "url", "#"),
        ];
    
        if ($item['level'] == 1) {
            $options['class'] = "br-menu-link";
        } else {
            $options['class'] = "sub-link";
        }
    
        if ($item["active"]) {
            Html::addCssClass($options, $this->activeCssClass);
        }
        
        if ($item["active"] and !empty($item["items"]) and $item["level"] === 1) {
            Html::addCssClass($options, "show-sub");
        }

        if (isset($item["class"])) {
            Html::addCssClass($options, $item["class"]);
        }
        
        if (!empty($item['items'])) {
            Html::addCssClass($options, "with-sub");
            $options['href'] = 'javascript:void(0);';
        } else {
            $options['href'] = Url::to($options['href']);
        }
        
        return Html::renderTagAttributes($options);
    }

    protected function _initOption()
    {
        $options = $this->options;
        $default = [
            'class' => 'br-sideleft-menu'
        ];
        
        $this->options = ArrayHelper::merge($default, $options);
    }
}
