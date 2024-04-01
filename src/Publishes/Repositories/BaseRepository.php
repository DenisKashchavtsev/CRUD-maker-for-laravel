<?php

namespace App\Repositories;

use App\Filters\Filterable;

abstract class BaseRepository
{
    use Filterable;

    protected string $model;

    public function getAll(): mixed
    {
        return $this->applyFiltersToQuery($this->model::query())->paginate();
    }

    public function getById(int $id): mixed
    {
        return $this->model::find($id);
    }

    public function create(array $data): mixed
    {
        return $this->model::create($data);
    }

    public function update(array $data, int $id): mixed
    {
        return tap($this->model::whereId($id)->first())->update($data);
    }

    public function delete(int $id): mixed
    {
        return $this->model::whereId($id)->delete();
    }
}
