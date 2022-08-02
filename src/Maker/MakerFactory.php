<?php

namespace DKart\CrudMaker\Maker;

use DKart\CrudMaker\Maker\Files\ControllerFile;
use DKart\CrudMaker\Maker\Files\ManagerFile;
use DKart\CrudMaker\Maker\Files\ModelFile;
use DKart\CrudMaker\Maker\Files\RepositoryFile;
use DKart\CrudMaker\Maker\Files\RequestFile;
use DKart\CrudMaker\Maker\Files\ViewListFile;
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
    public function makeManager(): mixed
    {
        return App::make(ManagerFile::class);
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
    public function makeViewList(): mixed
    {
        return App::make(ViewListFile::class);
    }
}
