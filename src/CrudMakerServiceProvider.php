<?php

namespace DKart\CrudMaker;

use DKart\CrudMaker\Builder\BuilderFactory;
use DKart\CrudMaker\Builder\BuilderFactoryInterface;
use DKart\CrudMaker\Commands\MakeCrud;
use Illuminate\Support\ServiceProvider;

class CrudMakerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('make:crud', function ($app) {
            return new MakeCrud();
        });
        $this->commands([
            'make:crud'
        ]);

        $this->publishes([
            __DIR__ . 'Config/crudMaker.php' => config_path('crudMaker.php'),
            __DIR__ . 'Publishes/Exceptions/ManagerErrorOnSaveException.php' => base_path('app/Exceptions/ManagerErrorOnSaveException.php'),
            __DIR__ . 'Publishes/Filters/BaseFilters.php' => base_path('app/Filters/BaseFilters.php'),
            __DIR__ . 'Publishes/Filters/Filterable.php' => base_path('app/Filters/Filterable.php'),
            __DIR__ . 'Publishes/Managers/Manager.php' => base_path('app/Http/Managers/Manager.php'),
        ], 'crudMaker');

        $this->app->bind(BuilderFactoryInterface::class, BuilderFactory::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'crudMaker.php', 'crudMaker'
        );
    }

}
