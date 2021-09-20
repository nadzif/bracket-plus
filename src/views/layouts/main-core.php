<?php

use akupeduli\bracket\Bracket;
use akupeduli\bracket\widgets\SidebarMenu;
use yii\helpers\Html;

$this->beginContent(__DIR__.'/base.php');
$bracket = Bracket::getComponent();
?>
<div class="br-logo">
    <?= $bracket->logo ?>
</div>
<?php
echo $this->render($bracket->sidebarFile);
echo $this->render($bracket->navbarFile);
echo Html::tag("div", $content, ["class" => "br-mainpanel"]);
$this->endContent();
