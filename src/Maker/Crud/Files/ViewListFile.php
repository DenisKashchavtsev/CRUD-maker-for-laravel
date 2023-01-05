<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class ViewListFile extends File
{
    const PREFIX_FILE = '.blade.php';

    const FILE_NAME = 'viewList';

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
     * @return string
     */
    protected function getFileName(): string
    {
        return 'list' . static::PREFIX_FILE;
    }

    /**
     * @return ModelFile
     */
    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$FIELDS$', $this->getFieldsTemplate());

        return parent::buildClass();
    }

    /**
     * @return string
     */
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
