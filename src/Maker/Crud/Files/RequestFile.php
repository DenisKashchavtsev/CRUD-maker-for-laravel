<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class RequestFile extends File
{
    const PREFIX_FILE = 'Request.php';

    const FILE_NAME = 'request';

    public function setSettings($settings): File
    {
        $this->patch = $settings['path'] . '/' . ucfirst($this->propertyContainer->getProperty('entity'));
        $this->namespace = $settings['namespace'] . '\\' . ucfirst($this->propertyContainer->getProperty('entity'));

        return parent::setSettings($settings);
    }

    /**
     * @return ModelFile
     */
    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$RULES$', $this->getRules());
        $this->shortcodes->setShortcode('$OA_FIELDS$', $this->getOAFields());

        return parent::buildClass();
    }

    /**
     * @return string
     */
    protected function getRules(): string
    {
        $rules = '';

        foreach ($this->fields->getFields() as $key => $field) {
            $rules .= ($key ? PHP_EOL . '            ' : '')
                . '\'' . $field . '\' => [\'required\'],';
        }

        return $rules;
    }

    /**
     * @return string
     */
    protected function getOAFields(): string
    {
        $fields = '';

        foreach ($this->fields->getFields() as $field) {
            $fields .= '* @OA\Property( property="' . $field . '", type="' . $this->fields->getFieldType($field) . '", title="' . ucfirst($field) . '", example="' . ucfirst($field) . '"),' . PHP_EOL;
        }

        return $fields;
    }
}
