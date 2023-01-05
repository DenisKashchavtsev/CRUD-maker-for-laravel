<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class ControllerFile extends File
{
    const PREFIX_FILE = 'Controller.php';

    const FILE_NAME = 'controller';

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return $this->propertyContainer->getProperty('entityPlural')
            . static::PREFIX_FILE;
    }
}
