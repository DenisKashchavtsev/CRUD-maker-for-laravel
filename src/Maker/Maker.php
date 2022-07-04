<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use Illuminate\Support\Facades\App;

class Maker
{
    /**
     * @param array $data
     * @return void
     */
    public function make(array $data): void
    {
        $builderFactory = App::make(MakerFactoryInterface::class);

        foreach ($this->getTemplateConfig($data['templateName']) as $file => $settings) {

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
     * @param string $template
     * @return array
     */
    private function getTemplateConfig(string $template): array
    {
        return config('crudMaker.templates')[strtolower($template)] ?? [];
    }
}
