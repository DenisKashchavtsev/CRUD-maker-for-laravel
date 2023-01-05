<?php

namespace DKart\CrudMaker\Maker\Crud;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class Fields
{
    /**
     * @var PropertyContainerInterface
     */
    protected PropertyContainerInterface $propertyContainer;

    /**
     * @param PropertyContainerInterface $propertyContainer
     */
    public function __construct(PropertyContainerInterface $propertyContainer)
    {
        $this->propertyContainer = $propertyContainer;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return Schema::getColumnListing(
            Str::snake($this->propertyContainer->getProperty('entityPlural'))
        );
    }

    /**
     * @param string $field
     * @return string
     */
    public function getFieldType(string $field): string
    {
        return Schema::getColumnType(Str::snake($this->propertyContainer->getProperty('entityPlural')), $field);
    }
}