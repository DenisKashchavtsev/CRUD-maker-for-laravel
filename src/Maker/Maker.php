<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use Illuminate\Support\Facades\App;

class Maker
{
    /**
     * Make our files
     */
    public function make($data): void
    {
        $builderFactory = App::make(MakerFactoryInterface::class);

        foreach ($this->getTemplateConfig($data['template']) as $file => $settings) {

            $methodName = 'make' . ucfirst($file);

            if (method_exists($builderFactory, $methodName)) {
                $builderFactory->$methodName([
                    ...$settings,
                    ...$data
                ])->make();
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
