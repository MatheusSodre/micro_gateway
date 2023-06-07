<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\User\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(protected RegisterService $registerService) 
    {
        
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->registerService->registerUser($request->all());
    }
}
