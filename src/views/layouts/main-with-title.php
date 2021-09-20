<?php

use akupeduli\bracket\Bracket;
use akupeduli\bracket\widgets\Breadcrumbs;
use akupeduli\bracket\widgets\FlashAlert;
use rmrevin\yii\ionicon\Ion;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->beginContent(__DIR__ . "/main-core.php");

$bracket = Bracket::getComponent();
$icon = ArrayHelper::getValue($this->params, "pageIcon");
$desc = ArrayHelper::getValue($this->params, "pageDescription");
$title = ArrayHelper::getValue($this->params, "pageTitle", $this->title);
$breadcrumbs = ArrayHelper::getValue($this->params, "breadcrumbs");

if (!is_null($breadcrumbs)) {
    $breadHtml = Breadcrumbs::widget(["links" => $breadcrumbs]);
    echo Html::tag("div", $breadHtml, ["class" => "br-pageheader"]);
}

$titleHtml = Html::tag('h4', $title);
$titleDesc = ($desc ? Html::tag("p", $desc, ["class" => "mg-b-0"]) : "");

echo Html::beginTag("div", ["class" => "br-pagetitle"]) .
    ($icon ? Ion::icon($icon)->addCssClass("icon") : "") .
    Html::tag("div", $titleHtml . $titleDesc) .
Html::endTag("div");

echo Html::beginTag("div", ["class" => "br-pagebody"]);
echo $bracket->withFlashAlert ? FlashAlert::widget() : ''; 
echo $content;
echo Html::endTag("div");
$this->endContent();
