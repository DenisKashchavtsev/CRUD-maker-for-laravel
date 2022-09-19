<?php

namespace DKart\CrudMaker\Maker\Files;

class TestFile extends File
{
    CONST PREFIX_FILE = 'Test.php';

    CONST FILE_NAME = 'test';

    /**
     * @return TestFile
     */
    protected function buildClass(): TestFile
    {
        $replaceArray = [
            '$ENTITY$' => $this->propertyContainer->getProperty('entity'),
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$SNAKE_ENTITY$' => lcfirst($this->propertyContainer->getProperty('entity')),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->propertyContainer->getProperty('entityPlural')),
            '$SNAKE_ENTITY_PLURAL$' => lcfirst($this->propertyContainer->getProperty('entityPlural')),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return $this->propertyContainer->getProperty('entityPlural')
            . static::PREFIX_FILE;
    }
}
