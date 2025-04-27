<?php

namespace App\Repositories;

use App\Models\User;
use \App\Repositories\Utils\GlobalCrudRepository;
use \App\Repositories\Utils\GlobalPaginateRepository;

class UserRepository
{
    use GlobalCrudRepository, GlobalPaginateRepository;
    
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function getAll(array $relations = [])
    {
        return $this->globalAll($relations);
    }

    public function getById(int $id, array $relations = [])
    {
        return $this->globalFind($id, $relations);
    }

    public function get(array $filters = [], array $relations = [])
    {
        return $this->globalGet($filters, $relations);
    }

    public function save(array $data)
    {
        return $this->globalSave($data);
    }

    public function update(int $id, array $data)
    {
        if(!$this->globalFind($id)) {
            return null;
        }
        return $this->globalUpdate($data);
    }

    public function delete(int $id)
    {
        if (!$this->globalFind($id)) {
            return null;
        }
        return $this->globalDelete();
    }

}