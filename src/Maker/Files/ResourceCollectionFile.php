<?php

namespace DKart\CrudMaker\Maker\Files;

class ResourceCollectionFile extends File
{
    CONST PREFIX_FILE = 'Collection.php';

    CONST FILE_NAME = 'resourceCollection';

    /**
     * @param $settings
     * @return File
     */
    public function setSettings($settings): File
    {
        $this->patch = $settings['path'] . '/' . ucfirst($this->propertyContainer->getProperty('entity'));
        $this->namespace = $settings['namespace'] . '\\' . ucfirst($this->propertyContainer->getProperty('entity'));

        return parent::setSettings($settings);
    }

    /**
     * @return ResourceCollectionFile
     */
    protected function buildClass(): ResourceCollectionFile
    {
        $replaceArray = [
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$NAMESPACE$' => $this->namespace,
            '$RULES$' => $this->getRules(),
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

    /**
     * @return string
     */
    protected function getRules(): string
    {
        $rules = '';

        foreach ($this->getFields() as $key => $field) {
            if($key) {
                $rules .= PHP_EOL . '            ';
            }
            $rules .= '\'' . $field . '\' => $this->'. $field .',';
        }

        return $rules;
    }
}
