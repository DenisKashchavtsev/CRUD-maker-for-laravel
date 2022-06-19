<?php

namespace DKart\CrudMaker\Builder;

use DKart\CrudMaker\Builder\Builders\ControllerBuilder;
use DKart\CrudMaker\Builder\Builders\ModelBuilder;
use Illuminate\Support\Facades\App;

class BuilderFactory implements BuilderFactoryInterface
{

    public function buildController($settings): mixed
    {
        return App::make(ControllerBuilder::class, [
            'settings' => $settings
        ]);
    }

    public function buildModel($settings): mixed
    {
        return App::make(ModelBuilder::class, [
            'settings' => $settings
        ]);
    }
}
