<?php

$addons = [
    'local_inspire' => [
        'handlers' => [
            'inspire' => [
                'delegate' => 'CoreMainMenuDelegate',
                'method' => 'render_index',
                'displaydata' => [
                    'title' => 'inspire',
                    'icon' => 'color-wand',
                ],
            ],
        ],
        'lang' => [
            ['inspire', 'local_inspire'],
        ],
    ],
];
