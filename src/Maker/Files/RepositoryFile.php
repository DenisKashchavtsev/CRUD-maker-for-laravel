<?php

namespace DKart\CrudMaker\Maker\Files;

class RepositoryFile extends File
{
    CONST PREFIX_FILE = 'Repository.php';

    CONST FILE_NAME = 'repository';

    /**
     * @return RepositoryFile
     */
    protected function buildClass(): RepositoryFile
    {
        $replaceArray = [
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->propertyContainer->getProperty('entityPlural')),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

}
