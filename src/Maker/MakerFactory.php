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
    public function makeController(): mixed
    {
        return App::make(ControllerFile::class);
    }

    public function makeModel(): mixed
    {
        return App::make(ModelFile::class);
    }

    public function makeRepository(): mixed
    {
        return App::make(RepositoryFile::class);
    }

    public function makeRequest(): mixed
    {
        return App::make(RequestFile::class);
    }

    public function makeResource(): mixed
    {
        return App::make(ResourceFile::class);
    }

    public function makeResourceCollection(): mixed
    {
        return App::make(ResourceCollectionFile::class);
    }

    public function makeViewList(): mixed
    {
        return App::make(ViewListFile::class);
    }

    public function makeViewForm(): mixed
    {
        return App::make(ViewFormFile::class);
    }

    public function makeViewShow(): mixed
    {
        return App::make(ViewShowFile::class);
    }

    public function makeTest(): mixed
    {
        return App::make(TestFile::class);
    }

    public function makeFactory(): mixed
    {
        return App::make(FactoryFile::class);
    }

    public function makeService(): mixed
    {
        return App::make(ServiceFile::class);
    }
}
