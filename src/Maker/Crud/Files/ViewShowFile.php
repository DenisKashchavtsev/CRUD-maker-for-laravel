<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class ViewShowFile extends File
{
    const PREFIX_FILE = '.blade.php';

    const FILE_NAME = 'viewShow';

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
        return 'show' . static::PREFIX_FILE;
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
            $fields .= '<span>{{ $'
                . lcfirst($this->propertyContainer->getProperty('entity'))
                . '->' . $field . ' }}</span>'
                . PHP_EOL;
        }

        return $fields;
    }
}
