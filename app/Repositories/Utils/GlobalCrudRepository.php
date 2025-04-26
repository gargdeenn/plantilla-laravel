<?php

namespace App\Repositories\Utils;

use Illuminate\Database\Eloquent\Model;

trait GlobalCrudRepository
{
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    public function globalFind(int $id, $relations = [])
    {
        $this->model = $this->model
                            ->with($relations)
                            ->find($id);

        return $this->model;
    }

    public function globalAll($relations = []): array
    {
        return $this->model
                    ->with($relations)
                    ->get()
                    ->toArray();
    }

    public function globalGet($filters = [], $relations = []): array
    {
        if ($filters && !empty($filters)) {
            return $this->model
                        ->filters($filters)
                        ->with($relations)
                        ->get()
                        ->toArray();
        } else {
            return $this->model
                        ->with($relations)
                        ->get()
                        ->toArray();
        }
    }

    public function globalSave(array $data)
    {
        $this->model->fill($data);
        if ($this->model->save()) {
            return $this->model;
        }

        return null;
    }

    public function globalUpdate(array $data)
    {
        $this->model->fill($data);
        if ($this->model->save()) {
            return $this->model;
        }

        return null;
    }

    public function globalDelete(array $relations = [])
    {
        if (!empty($relations)) {
            foreach ($relations as $relation) {
                if ($this->model->$relation()->exists()) {
                    return [
                        'status' => false,
                        'message' => 'Cannot delete this record because it has a relationship with ' . $relation
                    ];
                }
            }
        }

        if ($this->model->delete()) {
            return $this->model;
        }
    }

}