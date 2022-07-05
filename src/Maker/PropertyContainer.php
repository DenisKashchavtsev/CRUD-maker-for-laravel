<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Exception;

class PropertyContainer implements PropertyContainerInterface
{
    /**
     * @var array
     */
    private array $propertyContainer = [];

    /**
     * @param $propertyName
     * @param $value
     * @return void
     */
    function setProperty($propertyName, $value): void
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param $propertyName
     * @param $value
     * @return void
     * @throws Exception
     */
    function updateProperty($propertyName, $value): void
    {
        if (!isset($this->propertyContainer[$propertyName]))
        {
            throw new Exception("Property {$propertyName} not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param $propertyName
     * @return mixed
     * @throws Exception
     */
    function getProperty($propertyName): mixed
    {
        if (!isset($this->propertyContainer[$propertyName]))
        {
            throw new Exception("Property {$propertyName} not found");
        }

        return $this->propertyContainer[$propertyName];
    }

    /**
     * @param $propertyName
     * @return void
     */
    function deleteProperty($propertyName): void
    {
        unset($this->propertyContainer[$propertyName]);
    }
}
