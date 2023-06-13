<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\User\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function authUser(Request $request)
    {
        return $this->authService->authUser($request->all());
    }

    public function me(Request $request)
    {
        return $this->authService->getMe([
            'Authorization' => $request->header('Authorization')
        ]);
    }

    public function logout(Request $request)
    {
        return $this->authService->logout([
            'Authorization' => $request->header('Authorization')
        ]);
    }
}
