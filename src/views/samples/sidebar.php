<?php

use nadzif\bracket\Bracket;
use nadzif\bracket\widgets\SidebarMenu;

/** @var Bracket $bracket */
$bracket = Bracket::getComponent();
$sidebarConfig = Yii::getAlias($bracket->sidebarConfig);
?>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <?= SidebarMenu::widget(require($sidebarConfig)) ?>
</div>
