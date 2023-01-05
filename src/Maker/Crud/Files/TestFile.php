<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class TestFile extends File
{
    const PREFIX_FILE = 'Test.php';

    const FILE_NAME = 'test';

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return $this->propertyContainer->getProperty('entityPlural')
            . static::PREFIX_FILE;
    }
}
