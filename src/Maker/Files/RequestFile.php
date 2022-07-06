<?php

namespace DKart\CrudMaker\Maker\Files;

class RequestFile extends File
{
    CONST PREFIX_FILE = 'Request.php';

    CONST FILE_NAME = 'request';

    /**
     * @return RequestFile
     */
    protected function buildClass(): RequestFile
    {
        $replaceArray = [
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

}
