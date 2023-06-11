<?php

namespace DKart\CrudMaker\Maker\Interfaces;

interface PropertyContainerInterface
{
    function setProperty($propertyName, $value): void;

    function updateProperty($propertyName, $value): void;

    function getProperty($propertyName): mixed;

    function deleteProperty($propertyName): void;
}
