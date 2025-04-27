<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll(Request $request)
    {
        Log::info($request);
        $users = $this->userService->getAll($request->relations);
        return $this->returnResponse($users, 'Users retrieved successfully');
    }

    public function getById($id, Request $request)
    {
        $user = $this->userService->getById($id, $request->relations);
        if ($user) {
            return $this->returnResponse($user, 'User retrieved successfully');
        }
        return $this->returnResponse(null, 'User not found', false);
    }

    public function get(Request $request)
    {
        $user = $this->userService->get($request->filters, $request->relations);
        if ($user) {
            return $this->returnResponse($user, 'User retrieved successfully');
        }
        return $this->returnResponse(null, 'User not found', false);
    }

    public function save(Request $request)
    {
        $user = $this->userService->save($request->all());
        if ($user) {
            return $this->returnResponse($user, 'User saved successfully');
        }
        return $this->returnResponse(null, 'Failed to save user', false);
    }

    public function update(int $id, Request $request)
    {
        $user = $this->userService->update($id, $request->all());
        if ($user) {
            return $this->returnResponse($user, 'User updated successfully');
        }
        return $this->returnResponse(null, 'Failed to update user', false);
    }

    public function delete(int $id)
    {
        $user = $this->userService->delete($id);
        if ($user) {
            return $this->returnResponse($user, 'User deleted successfully');
        }
        return $this->returnResponse(null, 'Failed to delete user', false);
    }
}
