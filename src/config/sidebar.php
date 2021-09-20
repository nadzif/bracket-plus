<?php

use akupeduli\bracket\widgets\SidebarMenu;
use rmrevin\yii\ionicon\Ion;

return [
    "items" => [
        [
            "label" => "Dashboard",
            "icon"  => [
                'name' => Ion::_IOS_HOME_OUTLINE,
                'size' => SidebarMenu::_ICON_SIZE_24
            ],
            "items" => [
                [
                    "label" => "Dashboard 1",
                    "url"   => ["site/index"],
                ],
                [
                    "label" => "Dashboard 2",
                    "url"   => ["site/index1"],
                ],
                [
                    "label" => "Dashboard 3",
                    "url"   => ["site/index1"],
                ],
            ],
        ],
        [
            "label" => "App",
            "icon"  => [
                'name' => Ion::_ANDROID_STAR_OUTLINE,
                'size' => SidebarMenu::_ICON_SIZE_24
            ],
            "items" => [
                [
                    "label" => "App 1",
                    "url"   => ["site/index2"],
                ],
                [
                    "label" => "App 2",
                    "url"   => ["site/index1"],
                ],
                [
                    "label" => "App 3",
                    "url"   => ["site/index1"],
                ],
            ],
        ],
        [
            "label" => "Form",
            "icon"  => [
                'name' => Ion::_SOCIAL_WINDOWS_OUTLINE,
                'class' => 'custom-class'
            ],
            "items" => [
                [
                    "label" => "Form 1",
                    "url"   => ["site/index4"],
                ],
                [
                    "label" => "Form 2",
                    "url"   => ["site/index1"],
                ],
                [
                    "label" => "Form 3",
                    "url"   => ["site/index1"],
                ],
            ],
        ],
        [
            "label" => "Other",
            "icon"  => [
                'name' => Ion::_IOS_BOOKMARKS_OUTLINE,
                'class' => 'custom-class'
            ],
            "items" => [
                [
                    "label" => "Other 1",
                    "url"   => ["site/index2"],
                ],
                [
                    "label" => "Other 2",
                    "url"   => ["site/index1"],
                ],
                [
                    "label" => "Other 3",
                    "url"   => ["site/index1"],
                ],
            ],
        ],
    ],
];
