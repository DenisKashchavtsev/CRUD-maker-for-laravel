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
            '$PASCAL_ENTITY$' => ucfirst($this->entity),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->entityPlural),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

}
