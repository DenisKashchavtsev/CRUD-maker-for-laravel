<?php

namespace DKart\CrudMaker\Maker\Files;

class ControllerFile extends File
{
    CONST PREFIX_FILE = 'Controller.php';

    CONST FILE_NAME = 'controller';

    /**
     * @return ControllerFile
     */
    protected function buildClass(): ControllerFile
    {
        $replaceArray = [
            '$ENTITY$' => $this->propertyContainer->getProperty('entity'),
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->propertyContainer->getProperty('entityPlural')),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

}
