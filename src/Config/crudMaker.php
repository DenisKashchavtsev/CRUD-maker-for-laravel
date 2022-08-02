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
            'model' => [
                'path' => 'app/Models',
                'namespace' => 'App\Models'
            ],
            'manager' => [
                'path' => 'app/Http/Managers',
                'namespace' => 'App\Http\Managers'
            ],
            'repository' => [
                'path' => 'app/Repositories',
                'namespace' => 'App\Repositories'
            ],
            'request' => [
                'path' => 'app/Http/Requests',
                'namespace' => 'App\Http\Requests'
            ],
            'view' => [
                'path' => 'resources/views',
            ],
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
