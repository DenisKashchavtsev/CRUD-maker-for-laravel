<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Files\ControllerFile;
use DKart\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use Illuminate\Support\Facades\App;

class MakerFactory implements MakerFactoryInterface
{
    /**
     * @param $settings
     * @return mixed
     */
    public function makeController($settings): mixed
    {
        return App::make(ControllerFile::class, [
            'settings' => $settings
        ]);
    }
}
