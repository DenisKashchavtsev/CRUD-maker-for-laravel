<?php

namespace DKart\CrudMaker\Maker\Files;

class ControllerFile extends File
{
    /**
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->fileName = $settings['entityPlural'] . 'Controller.php';
        $this->template = config('crudMaker.dir_templates') . 'Default/controller';

        parent::__construct($settings);
    }

    /**
     * Build controller template parts
     *
     * @param $template
     *
     * @return mixed
     */
    protected function buildClass($template): mixed
    {
        $replaceArray = [
            '$ENTITY$' => $this->entity,
            '$PASCAL_ENTITY$' => ucfirst($this->entity),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->entityPlural),
            '$NAMESPACE$' => $this->namespace,
        ];

        return str_replace( array_keys($replaceArray), array_values($replaceArray), $template );
    }

}
