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

    public function save(array $data)
    {
        return $this->globalSave($data);
    }
}