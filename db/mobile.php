<?php

$addons = [
    'local_inspire' => [
        'handlers' => [
            'inspire' => [
                'delegate' => 'CoreMainMenuDelegate',
                'method' => 'render_inspire_static',
                'displaydata' => [
                    'title' => 'inspire_static',
                    'icon' => 'color-wand',
                ],
                'init' => 'init_javascript',
            ],
        ],
        'lang' => [
            ['inspire_static', 'local_inspire'],
            ['inspire_dynamic', 'local_inspire'],
            ['inspire', 'local_inspire'],
            ['refresh', 'local_inspire'],
        ],
    ],
];
