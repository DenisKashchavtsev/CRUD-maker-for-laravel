<?php

namespace DKart\CrudMaker\Maker\Files;

class ViewListFile extends File
{
    CONST PREFIX_FILE = '.php';

    CONST FILE_NAME = 'viewList';

    /**
     * @return ViewListFile
     */
    protected function buildClass(): ViewListFile
    {
        $replaceArray = [
            '$ENTITY$' => $this->propertyContainer->getProperty('entity'),
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->propertyContainer->getProperty('entityPlural')),
            '$NAMESPACE$' => $this->namespace,
            '$FILLABLE$' => $this->getFillable(),
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

    /**
     * @return string
     */
    protected function getFillable(): string
    {
        return '\'' . implode('\','. PHP_EOL .'        \'', $this->getFields()) . '\'';
    }
}
