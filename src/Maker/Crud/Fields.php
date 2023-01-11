<?php

namespace DKart\CrudMaker\Maker\Crud;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class Fields
{
    /**
     * @var array|string[]
     */
    protected array $ignoredFields = [
        'id',
        'created_at',
        'updated_at',
    ];

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
     * @param bool $ignoreDefaultFields
     * @return array
     */
    public function getFields(bool $ignoreDefaultFields = true): array
    {
        $fields = Schema::getColumnListing(
            Str::snake($this->propertyContainer->getProperty('entityPlural'))
        );

        if($ignoreDefaultFields) {
            return array_filter($fields, function ($value) {
                return !in_array($value, $this->ignoredFields);
            });
        }

        return $fields;
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