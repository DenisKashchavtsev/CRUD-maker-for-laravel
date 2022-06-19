<?php

namespace DKart\CrudMaker\Builder\Builders;

abstract class Builder
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
     *  Load controller template
     */
    protected function loadTemplate(): bool|string
    {
        return file_get_contents($this->template);
    }

    /**
     *  Publish file into it's place
     */
    protected function publish($template): void
    {
        dump(base_path($this->patch));
        if (! file_exists(base_path($this->patch))) {
            mkdir(base_path($this->patch));
            chmod(base_path($this->patch), 0777);
        }

        file_put_contents(base_path($this->patch) . '/' . $this->fileName, $template);
    }
}
