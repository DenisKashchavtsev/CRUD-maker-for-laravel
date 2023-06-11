<?php

namespace DKart\CrudMaker\Maker\Crud;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class Fields
{
    protected array $ignoredFields = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function __construct(protected PropertyContainerInterface $propertyContainer)
    {
    }

    public function getFields(bool $ignoreDefaultFields = true): array
    {
        $fields = Schema::getColumnListing(
            Str::snake($this->propertyContainer->getProperty('entityPlural'))
        );

        if ($ignoreDefaultFields) {
            return array_filter($fields, function ($value) {
                return !in_array($value, $this->ignoredFields);
            });
        }

        return $fields;
    }

    public function getFieldType(string $field): string
    {
        return Schema::getColumnType(Str::snake($this->propertyContainer->getProperty('entityPlural')), $field);
    }
}