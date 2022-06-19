<?php

namespace DKart\CrudMaker\Builder\Builders;

use Illuminate\Support\Str;

class ControllerBuilder extends Builder
{
    /**
     * @var string
     */
    private string $entity;

    /**
     * @var string
     */
    private string $entityPlural;

    /**
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->entity = Str::camel($settings['entity']);
        $this->entityPlural = Str::camel($settings['entityPlural']);
        $this->patch = $settings['path'];
        $this->fileName = $settings['entityPlural'] . 'Controller.php';
        $this->template = config('crudMaker.dir_templates') . 'Default/controller';

        parent::__construct($settings);
    }

    /**
     * Build our controller file
     */
    public function build()
    {
        $template = $this->loadTemplate();
        $template = $this->buildParts($template);
        $this->publish($template);
    }

    /**
     * Build controller template parts
     *
     * @param $template
     *
     * @return mixed
     */
    protected function buildParts($template)
    {
        $replaceArray = [
            '$ENTITY$' => $this->entity,
            '$PASCAL_ENTITY$' => ucfirst($this->entity),
            '$PASCAL_ENTITY_PLURAL$' => ucfirst($this->entityPlural),
        ];

        return str_replace( array_keys($replaceArray), array_values($replaceArray), $template);
    }

}
