<?php

use nadzif\bracket\Bracket;
use nadzif\bracket\widgets\FlashAlert;
use yii\helpers\Html;

/** @var Bracket $bracket */
$bracket = Bracket::getComponent();

$this->beginContent(__DIR__ . "/main-core.php");
echo Html::beginTag("div", ["class" => "br-pagebody"]);
echo $bracket->withFlashAlert ? FlashAlert::widget() : ''; 
echo $content;
echo Html::endTag("div");
$this->endContent();
