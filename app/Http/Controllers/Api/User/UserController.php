<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService) 
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->userService->allUser($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->userService->createUser($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $identify)
    {
        return $this->userService->getUser($identify);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $identify)
    {
        return $this->userService->updateUser($identify,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identify)
    {
        return $this->userService->deleteUser($identify);
    }
}
