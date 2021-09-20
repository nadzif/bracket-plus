<?php

use akupeduli\bracket\assets\plugins\DataTableAsset;
use akupeduli\bracket\assets\plugins\PopperAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\JqueryAsset;
use yii\web\View;

return [
    JqueryAsset::class => [
        "jsOptions" => [
            "position" => View::POS_HEAD,
        ],
    ],

    BootstrapPluginAsset::class => [
        'depends' => [
            JqueryAsset::class,
            PopperAsset::class
        ],
    ],

    'mimicreative\datatables\assets\DataTableAsset' => [
        'class' => DataTableAsset::class,
    ],
];
