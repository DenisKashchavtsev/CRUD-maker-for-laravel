<?php
/**
 * Templates package configuration file.
 */
return [
    'dir_templates' => dirname(__DIR__ . '../') . '/Templates/',
    'templates' => [
        'default' => [
            'controller' => [
                'path' => 'app/Http/Controllers',
                'namespace' => 'App\Http\Controllers'
            ],
//            'model' => [
//                'path' => 'app/Models',
//                'namespace' => 'App\Http\Controllers'
//            ],
        ],

        'admin' => [
            'controller' => [
                'path' => 'app/Http/Controllers/Admin',
                'namespace' => 'App\Http\Controllers'
            ],
            'model' => [
                'path' => 'app/Models',
            ],
        ],
    ],
];
