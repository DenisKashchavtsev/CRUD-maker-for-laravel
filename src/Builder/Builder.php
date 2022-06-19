<?php

namespace DKart\CrudMaker\Builder;

use Illuminate\Support\Facades\App;

class Builder
{
    /**
     * Build our files
     */
    public function build($data): void
    {
        $builderFactory = App::make(BuilderFactoryInterface::class);

        foreach ($this->getTemplateConfig($data['template']) as $file => $settings) {

            $methodName = 'build' . ucfirst($file);

            if (method_exists($builderFactory, $methodName)) {
                $builderFactory->$methodName([
                    ...$settings,
                    ...$data
                ])->build();
            }

        }
    }

    /**
     * @param $template
     * @return array
     */
    private function getTemplateConfig($template): array
    {
        return config('crudMaker.templates')[strtolower($template)] ?? [];
    }
}
