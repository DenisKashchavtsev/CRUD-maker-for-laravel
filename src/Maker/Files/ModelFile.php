<?php

namespace DKart\CrudMaker\Maker\Files;

class ModelFile extends File
{
    CONST PREFIX_FILE = '.php';

    CONST FILE_NAME = 'model';

    /**
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->fileName = $settings['entity'] . self::PREFIX_FILE;

        $this->templatePath = $this->getTemplatePath();

        parent::__construct($settings);
    }

    /**
     * @return string
     */
    protected function getTemplatePath(): string
    {
        return config('crudMaker.dir_templates')
            . $this->templateName
            . self::FILE_NAME;
    }

    /**
     * @return ModelFile
     */
    protected function buildClass(): ModelFile
    {
        $replaceArray = [
            '$ENTITY$' => $this->entity,
            '$PASCAL_ENTITY$' => ucfirst($this->entity),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->entityPlural),
            '$NAMESPACE$' => $this->namespace,
        ];

        $this->template = str_replace( array_keys($replaceArray), array_values($replaceArray), $this->template );

        return $this;
    }

}
