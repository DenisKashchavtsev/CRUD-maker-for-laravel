<?php

namespace App\Http\Managers;

use App\Exceptions\ManagerErrorOnSaveException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

abstract class Manager
{
    /**
     * @var mixed
     */
    protected mixed $entity;

    /**
     * @var array
     */
    protected array $relation = [];

    /**
     * @param array $data
     * @return object|null
     * @throws ManagerErrorOnSaveException
     */
    public function save(array $data): ?object
    {
        try {
            DB::beginTransaction();

            if ($this->entity->exists) {
                $this->entity->update($data);
            } else {
                $this->entity = $this->entity->create($data);
            }

            $this->saveRelation($data);

            DB::commit();

            return redirect()->back()->withSuccess("Success");
        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error($exception->getMessage());

            throw new ManagerErrorOnSaveException();
        }
    }

    public function delete($ids)
    {
        return redirect()->back()->withSuccess("Success");
    }

    /**
     * @param mixed $data
     * @return void
     */
    protected function saveRelation($data): void
    {
        foreach ($this->relation as $key) {
            $name = 'saveRelation' . ucfirst($key);

            if (method_exists($this, $name)) {
                $this->$name($data[$key] ?? []);
            }
        }
    }
}
