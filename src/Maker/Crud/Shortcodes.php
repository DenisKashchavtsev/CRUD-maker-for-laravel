<?php

namespace DKart\CrudMaker\Maker\Crud;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;

class Shortcodes
{
    /**
     * @var array
     */
    private array $shortcodes;

    /**
     * @var PropertyContainerInterface
     */
    private PropertyContainerInterface $propertyContainer;

    /**
     * @param PropertyContainerInterface $propertyContainer
     */
    public function __construct(PropertyContainerInterface $propertyContainer)
    {
        $this->propertyContainer = $propertyContainer;

        $this->setDefaultShortcodes();
    }

    /**
     * @return void
     */
    private function setDefaultShortcodes(): void
    {
        $this->shortcodes = [
            '$ENTITY$' => $this->propertyContainer->getProperty('entity'),
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$SNAKE_ENTITY$' => lcfirst($this->propertyContainer->getProperty('entity')),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->propertyContainer->getProperty('entityPlural')),
            '$SNAKE_ENTITY_PLURAL$' => lcfirst($this->propertyContainer->getProperty('entityPlural')),
        ];
    }

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public function setShortcode($key, $value): void
    {
        $this->shortcodes[$key] = $value;
    }

    /**
     * @return array
     */
    public function getShortcodesKeys(): array
    {
        return array_keys($this->shortcodes);
    }

    /**
     * @return array
     */
    public function getShortcodesValues(): array
    {
        return array_values($this->shortcodes);
    }
}