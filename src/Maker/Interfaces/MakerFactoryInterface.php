<?php

namespace DKart\CrudMaker\Maker\Interfaces;

interface MakerFactoryInterface
{
    public function makeController(): mixed;

    public function makeModel(): mixed;

    public function makeRepository(): mixed;

    public function makeRequest(): mixed;

    public function makeViewList(): mixed;

    public function makeViewForm(): mixed;

    public function makeViewShow(): mixed;

    public function makeTest(): mixed;
}
