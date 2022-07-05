<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use DKart\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use Illuminate\Support\Facades\App;

class Maker
{
    /**
     * @var PropertyContainerInterface
     */
    private PropertyContainerInterface $propertyContainer;

    /**
     * @param PropertyContainerInterface $propertyContainer
     */
    public function __construct(PropertyContainerInterface $propertyContainer)
    {
        $this->propertyContainer = $propertyContainer;
    }

    /**
     * @return void
     */
    public function make(): void
    {
        $builderFactory = App::make(MakerFactoryInterface::class);

        foreach ($this->getTemplateConfig() as $file => $settings) {

            $methodName = 'make' . ucfirst($file);

            if (method_exists($builderFactory, $methodName)) {
                $builderFactory->$methodName([
                    ...$settings
                ])->make();
            }
        }
    }

    /**
     * @return array
     */
    private function getTemplateConfig(): array
    {
        return config('crudMaker.templates')[
            strtolower($this->propertyContainer->getProperty('templateName'))
            ] ?? [];
    }
}
