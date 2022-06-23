<?php

namespace DKart\CrudMaker\Maker\Files;

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
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->patch = $settings['path'];
        $this->namespace = $settings['namespace'];
    }

    /**
     * @return bool|string
     */
    protected function loadTemplate(): bool|string
    {
        return file_get_contents($this->template);
    }

    /**
     * @param $template
     * @return void
     */
    protected function publish($template): void
    {
        if (! file_exists(base_path($this->patch))) {
            mkdir(base_path($this->patch));
            chmod(base_path($this->patch), 0777);
        }

        file_put_contents(base_path($this->patch) . '/' . $this->fileName, $template);
    }
}
