<?php

namespace DKart\CrudMaker\Maker\Interfaces;

interface MakerFactoryInterface
{
    /**
     * @return mixed
     */
    public function makeController(): mixed;

    /**
     * @return mixed
     */
    public function makeManager(): mixed;

    /**
     * @return mixed
     */
    public function makeModel(): mixed;

    /**
     * @return mixed
     */
    public function makeRepository(): mixed;

    /**
     * @return mixed
     */
    public function makeRequest(): mixed;

    /**
     * @return mixed
     */
    public function makeViewList(): mixed;

    /**
     * @return mixed
     */
    public function makeViewForm(): mixed;
}
