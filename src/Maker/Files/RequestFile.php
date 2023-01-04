<?php

namespace DKart\CrudMaker\Maker\Files;

class RequestFile extends File
{
    CONST PREFIX_FILE = 'Request.php';

    CONST FILE_NAME = 'request';

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
     * @return RequestFile
     */
    protected function buildClass(): RequestFile
    {
        $replaceArray = [
            '$PASCAL_ENTITY$' => ucfirst($this->propertyContainer->getProperty('entity')),
            '$NAMESPACE$' => $this->namespace,
            '$RULES$' => $this->getRules(),
            '$OA_FIELDS$' => $this->getOAFields(),
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

        foreach ($this->getFields() as $key => $field) {
            if (!in_array($field, $this->ignoredFields)) {
                $fields .= '* @OA\Property( property="' . $field . '", type="'.$this->getFieldType($field).'", title="' . ucfirst($field) . '", example="' . ucfirst($field) . '"),' . PHP_EOL;
            }
        }

        return $fields;
    }
}
