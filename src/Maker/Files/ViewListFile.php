<?php

namespace DKart\CrudMaker\Maker\Files;

class ViewListFile extends File
{
    CONST PREFIX_FILE = '.blade.php';

    CONST FILE_NAME = 'viewList';

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return 'list' . static::PREFIX_FILE;
    }

    /**
     * @param $settings
     * @return File
     */
    public function setSettings($settings): File
    {
        $this->patch = $settings['path'] . '/' . lcfirst($this->propertyContainer->getProperty('entity'));

        return $this;
    }

    /**
     * @return ViewListFile
     */
    protected function buildClass(): ViewListFile
    {
        $replaceArray = [
            '$ENTITY$' => $this->propertyContainer->getProperty('entity'),
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$SNAKE_ENTITY$' => lcfirst($this->propertyContainer->getProperty('entity')),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->propertyContainer->getProperty('entityPlural')),
            '$FIELDS$' => $this->getFieldsTemplate(),
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

    /**
     * @return string
     */
    protected function getFieldsTemplate(): string
    {
        $fields = '';

        foreach ($this->getFields() as $field) {
            $fields .= '<td>{{ $'
                . lcfirst($this->propertyContainer->getProperty('entity'))
                . '->' . $field . ' }}</td>'
                . PHP_EOL;
        }

        return $fields;
    }
}
