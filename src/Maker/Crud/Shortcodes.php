<?php

namespace DKart\CrudMaker\Maker\Crud;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;

class Shortcodes
{
    private array $shortcodes;

    public function __construct(private PropertyContainerInterface $propertyContainer)
    {
        $this->setDefaultShortcodes();
    }

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

    public function setShortcode($key, $value): void
    {
        $this->shortcodes[$key] = $value;
    }

    public function getShortcodesKeys(): array
    {
        return array_keys($this->shortcodes);
    }

    public function getShortcodesValues(): array
    {
        return array_values($this->shortcodes);
    }
}