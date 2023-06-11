<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class ViewListFile extends File
{
    const PREFIX_FILE = '.blade.php';

    const FILE_NAME = 'viewList';

    public function setSettings($settings): File
    {
        $this->patch = $settings['path'] . '/' . lcfirst($this->propertyContainer->getProperty('entity'));

        return $this;
    }

    protected function getFileName(): string
    {
        return 'list' . static::PREFIX_FILE;
    }

    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$FIELDS$', $this->getFieldsTemplate());

        return parent::buildClass();
    }

    protected function getFieldsTemplate(): string
    {
        $fields = '';

        foreach ($this->fields->getFields() as $field) {
            $fields .= '<td>{{ $'
                . lcfirst($this->propertyContainer->getProperty('entity'))
                . '->' . $field . ' }}</td>'
                . PHP_EOL;
        }

        return $fields;
    }
}
