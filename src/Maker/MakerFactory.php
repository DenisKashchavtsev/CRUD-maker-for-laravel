<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Crud\Files\ControllerFile;
use DKart\CrudMaker\Maker\Crud\Files\FactoryFile;
use DKart\CrudMaker\Maker\Crud\Files\ModelFile;
use DKart\CrudMaker\Maker\Crud\Files\RepositoryFile;
use DKart\CrudMaker\Maker\Crud\Files\RequestFile;
use DKart\CrudMaker\Maker\Crud\Files\ResourceCollectionFile;
use DKart\CrudMaker\Maker\Crud\Files\ResourceFile;
use DKart\CrudMaker\Maker\Crud\Files\ServiceFile;
use DKart\CrudMaker\Maker\Crud\Files\TestFile;
use DKart\CrudMaker\Maker\Crud\Files\ViewFormFile;
use DKart\CrudMaker\Maker\Crud\Files\ViewListFile;
use DKart\CrudMaker\Maker\Crud\Files\ViewShowFile;
use DKart\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use Illuminate\Support\Facades\App;

class MakerFactory implements MakerFactoryInterface
{
    /**
     * @return mixed
     */
    public function makeController(): mixed
    {
        return App::make(ControllerFile::class);
    }

    /**
     * @return mixed
     */
    public function makeModel(): mixed
    {
        return App::make(ModelFile::class);
    }

    /**
     * @return mixed
     */
    public function makeRepository(): mixed
    {
        return App::make(RepositoryFile::class);
    }

    /**
     * @return mixed
     */
    public function makeRequest(): mixed
    {
        return App::make(RequestFile::class);
    }

    /**
     * @return mixed
     */
    public function makeResource(): mixed
    {
        return App::make(ResourceFile::class);
    }

    /**
     * @return mixed
     */
    public function makeResourceCollection(): mixed
    {
        return App::make(ResourceCollectionFile::class);
    }

    /**
     * @return mixed
     */
    public function makeViewList(): mixed
    {
        return App::make(ViewListFile::class);
    }

    /**
     * @return mixed
     */
    public function makeViewForm(): mixed
    {
        return App::make(ViewFormFile::class);
    }

    /**
     * @return mixed
     */
    public function makeViewShow(): mixed
    {
        return App::make(ViewShowFile::class);
    }

    /**
     * @return mixed
     */
    public function makeTest(): mixed
    {
        return App::make(TestFile::class);
    }

    /**
     * @return mixed
     */
    public function makeFactory(): mixed
    {
        return App::make(FactoryFile::class);
    }

    /**
     * @return mixed
     */
    public function makeService(): mixed
    {
        return App::make(ServiceFile::class);
    }
}
