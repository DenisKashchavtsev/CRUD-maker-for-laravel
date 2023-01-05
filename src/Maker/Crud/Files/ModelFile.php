<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class ModelFile extends File
{
    const PREFIX_FILE = '.php';

    const FILE_NAME = 'model';

    /**
     * @return ModelFile
     */
    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$FILLABLE$', $this->getFillable());

        return parent::buildClass();
    }

    /**
     * @return string
     */
    protected function getFillable(): string
    {
        return '\'' . implode('\',' . PHP_EOL . '        \'', $this->fields->getFields()) . '\'';
    }
}
