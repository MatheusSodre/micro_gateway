<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

use App\Services\User\PermissionUserService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class PermissionUserController extends Controller
{
    public function __construct(protected UserService $userService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function addPermissionUser(Request $request)
    {
        return $this->userService->addPermissionUser($request->all());
    }
}
