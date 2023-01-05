<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

class RequestFile extends File
{
    const PREFIX_FILE = 'Request.php';

    const FILE_NAME = 'request';

    protected array $ignoredFields = [
        'id',
        'created_at',
        'updated_at',
    ];

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
            if ($key) {
                $rules .= PHP_EOL . '            ';
            }
            if (!in_array($field, $this->ignoredFields)) {
                $rules .= '\'' . $field . '\' => [\'required\'],';
            } else {
                $rules .= '\'' . $field . '\' => [\'sometimes\'],';
            }
        }

        return $rules;
    }

    /**
     * @return string
     */
    protected function getOAFields(): string
    {
        $fields = '';

        foreach ($this->fields->getFields() as $key => $field) {
            if (!in_array($field, $this->ignoredFields)) {
                $fields .= '* @OA\Property( property="' . $field . '", type="' . $this->fields->getFieldType($field) . '", title="' . ucfirst($field) . '", example="' . ucfirst($field) . '"),' . PHP_EOL;
            }
        }

        return $fields;
    }
}
