<?php

namespace DKart\CrudMaker\Maker\Files;

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
    protected string $fileName;

    /**
     * @var string
     */
    protected string $patch;

    /**
     * @var string
     */
    protected string $namespace;

    /**
     * @var string
     */
    protected string $entity;

    /**
     * @var string
     */
    protected string $entityPlural;

    /**
     * @var string
     */
    protected string $templatePath;

    /**
     * @var string
     */
    protected string $templateName;

    /**
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->entity = Str::camel($settings['entity']);
        $this->entityPlural = Str::camel($settings['entityPlural']);
        $this->patch = $settings['path'];
        $this->namespace = $settings['namespace'];
        $this->templateName = $settings['templateName'];
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
        $this->template = file_get_contents($this->templatePath);

        return $this;
    }

    abstract protected function buildClass();

    /**
     * @return void
     */
    protected function publish(): void
    {
        if (! file_exists(base_path($this->patch))) {
            mkdir(base_path($this->patch));
            chmod(base_path($this->patch), 0777);
        }

        file_put_contents(base_path($this->patch) . '/' . $this->fileName, $this->template);
    }
}
