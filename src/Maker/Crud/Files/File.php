<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

use DKart\CrudMaker\Maker\Crud\Fields;
use DKart\CrudMaker\Maker\Crud\Shortcodes;
use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;

abstract class File
{
    /**
     * @var string
     */
    protected string $template;

    /**
     * @var string
     */
    protected string $patch;

    /**
     * @var string
     */
    protected string $namespace;

    /**
     * @var PropertyContainerInterface
     */
    protected PropertyContainerInterface $propertyContainer;

    /**
     * @var Fields
     */
    protected Fields $fields;

    /**
     * @var Shortcodes
     */
    protected Shortcodes $shortcodes;

    /**
     * @param PropertyContainerInterface $propertyContainer
     * @param Fields $fields
     * @param Shortcodes $shortcodes
     */
    public function __construct(
        PropertyContainerInterface $propertyContainer,
        Fields                     $fields,
        Shortcodes                 $shortcodes
    )
    {
        $this->propertyContainer = $propertyContainer;
        $this->fields = $fields;
        $this->shortcodes = $shortcodes;
    }

    /**
     * @param $settings
     * @return File
     */
    public function setSettings($settings): File
    {
        $this->patch = $this->patch ?? $settings['path'];
        $this->namespace = $this->namespace ?? $settings['namespace'] ?? '';

        return $this;
    }

    /**
     * @return void
     */
    public function make(): void
    {
        $this->loadTemplate()
            ->buildClass()
            ->publish();
    }

    /**
     * @return void
     */
    protected function publish(): void
    {
        if (!file_exists(base_path($this->patch))) {
            mkdir(base_path($this->patch), 0775, true);
        }

        file_put_contents(base_path($this->patch) . '/' . $this->getFileName(), $this->template);
    }

    /**
     * @return string
     */
    protected function getFileName(): string
    {
        return $this->propertyContainer->getProperty('entity')
            . static::PREFIX_FILE;
    }

    /**
     * @return File
     */
    protected function buildClass(): File
    {
        $this->shortcodes->setShortcode('$NAMESPACE$', $this->namespace ?? '');

        $this->template = str_replace(
            $this->shortcodes->getShortcodesKeys(),
            $this->shortcodes->getShortcodesValues(),
            $this->template
        );

        return $this;
    }

    /**
     * @return File
     */
    protected function loadTemplate(): static
    {
        $this->template = file_get_contents($this->getTemplatePath());

        return $this;
    }

    /**
     * @return string
     */
    protected function getTemplatePath(): string
    {
        return config('crudMaker.dir_templates')
            . $this->propertyContainer->getProperty('templateName')
            . '/'
            . static::FILE_NAME;
    }
}
