<?php

namespace DKart\CrudMaker\Maker\Files;

class ViewFormFile extends File
{
    CONST PREFIX_FILE = '.blade.php';

    CONST FILE_NAME = 'viewForm';

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return 'form' . static::PREFIX_FILE;
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
     * @return ViewFormFile
     */
    protected function buildClass(): ViewFormFile
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
            $fields .= '<input type="text" value="{{ $'
                . lcfirst($this->propertyContainer->getProperty('entity'))
                . '->' . $field . '  ?? \'\' }}">'
                . PHP_EOL;
        }

        return $fields;
    }
}
