<?php

namespace DKart\CrudMaker\Maker\Interfaces;

interface PropertyContainerInterface
{
    /**
     * @param $propertyName
     * @param $value
     * @return void
     */
    function setProperty($propertyName, $value): void;

    /**
     * @param $propertyName
     * @param $value
     * @return void
     */
    function updateProperty($propertyName, $value): void;

    /**
     * @param $propertyName
     * @param $value
     * @return mixed
     */
    function getProperty($propertyName): mixed;

    /**
     * @param $propertyName
     * @return void
     */
    function deleteProperty($propertyName): void;
}
