<?php
namespace App\Services;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll(array $relations = [])
    {
        return $this->userRepository->getAll($relations);
    }

    public function getById(int $id, array $relations = [])
    {
        return $this->userRepository->getById($id, $relations);
    }

    public function get(array $filters = [], array $relations = [])
    {
        return $this->userRepository->get($filters, $relations);
    }

    public function save(array $data)
    {
        return $this->userRepository->save($data);
    }

    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }

}