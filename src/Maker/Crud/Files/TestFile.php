<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class TestFile extends File
{
    const PREFIX_FILE = 'Test.php';

    const FILE_NAME = 'test';

    /**
     * @return ModelFile
     */
    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$JSON_STRUCTURE$', $this->getJsonStructure());
        $this->shortcodes->setShortcode('$FIELDS$', $this->getFields());

        return parent::buildClass();
    }

    /**
     * @return string
     */
    protected function getFields(): string
    {
        $fields = '';

        foreach ($this->fields->getFields() as $key => $field) {
            if($this->fields->getFieldType($field) === 'string') {
                $fields .= ($key ? PHP_EOL . '            ' : '')
                    . '\'' . $field . '\' => \'' . ucfirst($field) . '\',';
            }
            if($this->fields->getFieldType($field) === 'boolean') {
                $fields .= ($key ? PHP_EOL . '            ' : '')
                    . '\'' . $field . '\' => \'' . 1 . '\',';
            }
            if($this->fields->getFieldType($field) === 'integer') {
                $fields .= ($key ? PHP_EOL . '            ' : '')
                    . '\'' . $field . '\' => \'' . 100 . '\',';
            }
            if($this->fields->getFieldType($field) === 'float') {
                $fields .= ($key ? PHP_EOL . '            ' : '')
                    . '\'' . $field . '\' => \'' . 100.1 . '\',';
            }
        }

        return $fields;
    }

    /**
     * @return string
     */
    protected function getJsonStructure(): string
    {
        return '\'' . implode('\',' . PHP_EOL . '                \'', $this->fields->getFields(false)) . '\'';
    }
}
