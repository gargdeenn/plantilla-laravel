<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function save(Request $request)
    {
        $user = $this->userService->save($request->all());
        if ($user) {
            return $this->returnResponse($user, 'User saved successfully');
        }
        return $this->returnResponse(null, 'Failed to save user', false);
    }
}
