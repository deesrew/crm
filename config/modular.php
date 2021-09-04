<?php
return [
    'path' => base_path() . '/app/Modules',
    'base_namespace' => 'App\Modules',
    'groupWithoutPrefix' => 'Pub',

    'groupMidleware' => [
        'Admin' => [
            'web' => ['auth'],
            'api' => ['auth.api'],
        ]
    ],

    'modules' => [
        'Admin' => [
            'User'
        ],

        'Pub' => [
            'Auth'
        ],
    ]
];