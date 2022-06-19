<?php

namespace DKart\CrudMaker\Builder;

interface BuilderFactoryInterface
{
    /**
     * @param $settings
     * @return mixed
     */
    public function buildController($settings): mixed;

    /**
     * @param $settings
     * @return mixed
     */
    public function buildModel($settings): mixed;
}
