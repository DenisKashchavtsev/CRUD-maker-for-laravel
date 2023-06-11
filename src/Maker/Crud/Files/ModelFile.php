<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class ModelFile extends File
{
    const PREFIX_FILE = '.php';

    const FILE_NAME = 'model';

    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$FILLABLE$', $this->getFillable());

        return parent::buildClass();
    }

    protected function getFillable(): string
    {
        return '\'' . implode('\',' . PHP_EOL . '        \'', $this->fields->getFields()) . '\'';
    }
}
