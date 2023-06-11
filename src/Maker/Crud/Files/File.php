<?php

namespace DKart\CrudMaker\Maker\Crud\Files;

use DKart\CrudMaker\Maker\Crud\Fields;
use DKart\CrudMaker\Maker\Crud\Shortcodes;
use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;

abstract class File
{
    protected string $template;
    protected string $patch;
    protected string $namespace;

    public function __construct(protected PropertyContainerInterface $propertyContainer,
                                protected Fields                     $fields,
                                protected Shortcodes                 $shortcodes)
    {
    }

    public function setSettings($settings): File
    {
        $this->patch = $this->patch ?? $settings['path'];
        $this->namespace = $this->namespace ?? $settings['namespace'] ?? '';

        return $this;
    }

    public function make(): void
    {
        $this->loadTemplate()
            ->buildClass()
            ->publish();
    }

    protected function publish(): void
    {
        if (!file_exists(base_path($this->patch))) {
            mkdir(base_path($this->patch), 0775, true);
        }

        file_put_contents(base_path($this->patch) . '/' . $this->getFileName(), $this->template);
    }

    protected function getFileName(): string
    {
        return $this->propertyContainer->getProperty('entity')
            . static::PREFIX_FILE;
    }

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

    protected function loadTemplate(): static
    {
        $this->template = file_get_contents($this->getTemplatePath());

        return $this;
    }

    protected function getTemplatePath(): string
    {
        return config('crudMaker.dir_templates')
            . $this->propertyContainer->getProperty('templateName')
            . '/'
            . static::FILE_NAME;
    }
}
