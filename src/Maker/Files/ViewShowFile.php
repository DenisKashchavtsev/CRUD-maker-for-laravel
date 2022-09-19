<?php

namespace DKart\CrudMaker\Maker\Files;

class ViewShowFile extends File
{
    CONST PREFIX_FILE = '.blade.php';

    CONST FILE_NAME = 'viewShow';

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return 'show' . static::PREFIX_FILE;
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
     * @return ViewShowFile
     */
    protected function buildClass(): ViewShowFile
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
            $fields .= '<span>{{ $'
                . lcfirst($this->propertyContainer->getProperty('entity'))
                . '->' . $field . ' }}</span>'
                . PHP_EOL;
        }

        return $fields;
    }
}
