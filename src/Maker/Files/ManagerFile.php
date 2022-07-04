<?php

namespace DKart\CrudMaker\Maker\Files;

class ManagerFile extends File
{
    CONST PREFIX_FILE = 'Manager.php';

    CONST FILE_NAME = 'manager';

    /**
     * @return ManagerFile
     */
    protected function buildClass(): ManagerFile
    {
        $replaceArray = [
            '$PASCAL_ENTITY$' => ucfirst($this->entity),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

}
