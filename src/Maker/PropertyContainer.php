<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Exception;

class PropertyContainer implements PropertyContainerInterface
{
    private array $propertyContainer = [];

    function setProperty($propertyName, $value): void
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    function updateProperty($propertyName, $value): void
    {
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new Exception("Property {$propertyName} not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }

    function getProperty($propertyName): mixed
    {
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new Exception("Property {$propertyName} not found");
        }

        return $this->propertyContainer[$propertyName];
    }

    function deleteProperty($propertyName): void
    {
        unset($this->propertyContainer[$propertyName]);
    }
}
