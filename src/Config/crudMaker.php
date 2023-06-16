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
            'repository' => [
                'path' => 'app/Repositories',
                'namespace' => 'App\Repositories'
            ],
            'request' => [
                'path' => 'app/Http/Requests',
                'namespace' => 'App\Http\Requests'
            ],
            'viewList' => [
                'path' => 'resources/views',
            ],
            'viewForm' => [
                'path' => 'resources/views',
            ],
            'viewShow' => [
                'path' => 'resources/views',
            ],
            'test' => [
                'path' => 'tests/Feature',
                'namespace' => 'Tests\Feature'
            ],
            'factory' => [
                'path' => 'database/factories',
                'namespace' => 'Database\Factories'
            ],
            'service' => [
                'path' => 'app/Services',
                'namespace' => 'App\Services'
            ],
        ],

        'api' => [
            'controller' => [
                'path' => 'app/Http/Controllers',
                'namespace' => 'App\Http\Controllers'
            ],
            'model' => [
                'path' => 'app/Models',
                'namespace' => 'App\Models'
            ],
            'repository' => [
                'path' => 'app/Repositories',
                'namespace' => 'App\Repositories'
            ],
            'request' => [
                'path' => 'app/Http/Requests',
                'namespace' => 'App\Http\Requests'
            ],
            'resource' => [
                'path' => 'app/Http/Resources',
                'namespace' => 'App\Http\Resources'
            ],
            'resourceCollection' => [
                'path' => 'app/Http/Resources',
                'namespace' => 'App\Http\Resources'
            ],
            'test' => [
                'path' => 'tests/Feature',
                'namespace' => 'Tests\Feature'
            ],
            'factory' => [
                'path' => 'database/factories',
                'namespace' => 'Database\Factories'
            ],
            'service' => [
                'path' => 'app/Services',
                'namespace' => 'App\Services'
            ],
        ],
    ],
];
