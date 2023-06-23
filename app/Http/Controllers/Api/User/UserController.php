<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
*@OA\PathItem(
*path="/user",
*)
*/
class UserController extends Controller
{
    public function __construct(protected UserService $userService) 
    {
    }
    
    

    /**
    * @OA\Get(
    *   path="/api/user",
    *   tags={"user"},
    *   summary="Pegar tosdos usuarios",
    *   security={{"bearer_token":{}}},
    *   @OA\Response(response="200",description="successful operation",),
    * )
    *    
    */
    public function index(Request $request)
    {
        return $this->userService->allUser($request->all());
    }

    /**
     * @OA\Post(
     *     path="/api/user",
     *     tags={"user"},
     *     summary="Adicionar usuario",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="email"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="password"
     *                 ),
     *                 example={"name": "Matheus Sodré","email" : "matheus@email.com","password": "senha12324"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
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
