<?php

namespace DKart\CrudMaker\Maker\Files;

class ModelFile extends File
{
    CONST PREFIX_FILE = '.php';

    CONST FILE_NAME = 'model';

    /**
     * @return ModelFile
     */
    protected function buildClass(): ModelFile
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

    protected function getFillable()
    {
        return implode(',', $this->getFields());
    }
}
