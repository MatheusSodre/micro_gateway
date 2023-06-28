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
    *   summary="Pegar todos usuarios",
    *   security={{"bearer_token":{}}},
     *     @OA\Response(
     *            response=200,
     *            description="OK",
     *     @OA\JsonContent(
     *             @OA\Property(property="ideentify", type="string"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="permissions", type="string")
     *         )
     *    ),
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
     *                 @OA\Property(property="name",type="string"),
     *                 @OA\Property(property="email",type="email"),
     *                 @OA\Property(property="password",type="password"),
     *                 example={"name": "Matheus Sodré","email" : "matheus@email.com","password": "senha12324"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *            response=200,
     *            description="OK",
     *     @OA\JsonContent(
     *             @OA\Property(property="ideentify", type="string"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="permissions", type="string")
     *         )
     *    ),
     *    @OA\Response(
     *        response=401,
     *        description="Unauthenticated",
     *    ),
     *    @OA\Response(
     *        response=422,
     *        description="The email has already been taken",
     *    ),
     * )
     */
    public function store(Request $request)
    {
        return $this->userService->createUser($request->all());
    }

    /**
     * @OA\Get(
     *      path="/api/user/{uuid}",
     *      tags={"user"},
     *      security={{"bearer_token":{}}},
     *      summary="Pegar usuario pelo uuid",
     *      description="Returns project data",
     *      @OA\Parameter(
     *          name="uuid",
     *          description="Usuario uuid",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *         @OA\Schema(type="string"),
     *      ),
     *     @OA\Response(
     *            response=200,
     *            description="OK",
     *     @OA\JsonContent(
     *             @OA\Property(property="ideentify", type="string"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="permissions", type="string")
     *         )
     *    ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function show(string $identify)
    {
        return $this->userService->getUser($identify);
    }
     /**
     * @OA\Put(
     *     path="/api/user/{uuid}",
     *     summary="Atualizar usuario",
     *     tags={"user"},
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="valor UUID"),
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="OK"
     *     )
     * )
     */
    public function update(Request $request, string $identify)
    {
        return $this->userService->updateUser($identify,$request->all());
    }

    /**
     * @OA\Delete(
     *     path="/api/user/{uuid}",
     *     description="Deletar usuario",
     *     summary="Deletar usuario",
     *     tags={"user"},
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         description="ID of pet to delete",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             format="int64",
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="pet deleted"
     *     )
     * )
     */
    public function destroy(string $identify)
    {
        return $this->userService->deleteUser($identify);
    }
}
