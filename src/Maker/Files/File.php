<?php

namespace DKart\CrudMaker\Maker\Files;

use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

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
     * @param PropertyContainerInterface $propertyContainer
     */
    public function __construct(PropertyContainerInterface $propertyContainer)
    {
        $this->propertyContainer = $propertyContainer;
    }

    /**
     * @param $settings
     * @return File
     */
    public function setSettings($settings): File
    {
        $this->patch = $settings['path'];
        $this->namespace = $settings['namespace'] ?? '';

        return $this;
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
     * @return string
     */
    protected function getTemplatePath(): string
    {
        return config('crudMaker.dir_templates')
            . $this->propertyContainer->getProperty('templateName')
            . '/'
            . static::FILE_NAME;
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
     * @return File
     */
    protected function loadTemplate(): static
    {
        $this->template = file_get_contents($this->getTemplatePath());

        return $this;
    }

    /**
     * @return mixed
     */
    abstract protected function buildClass(): mixed;

    /**
     * @return void
     */
    protected function publish(): void
    {
        if (!file_exists(base_path($this->patch))) {
            mkdir(base_path($this->patch));
        }

        file_put_contents(base_path($this->patch) . '/' . $this->getFileName(), $this->template);
    }

    /**
     * @return array
     */
    protected function getFields(): array
    {
        return Schema::getColumnListing(
            Str::snake($this->propertyContainer->getProperty('entityPlural'))
        );
    }

    /**
     * @param string $field
     * @return string
     */
    protected function getFieldType(string $field): string
    {
        return Schema::getColumnType(Str::snake($this->propertyContainer->getProperty('entityPlural')), $field);
    }
}
