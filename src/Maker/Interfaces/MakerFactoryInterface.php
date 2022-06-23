<?php

namespace DKart\CrudMaker\Maker\Interfaces;

interface MakerFactoryInterface
{
    /**
     * @param $settings
     * @return mixed
     */
    public function makeController($settings): mixed;
}
