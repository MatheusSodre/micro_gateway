<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Services\Account\LoginLocalAccountService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HTTP;

class AccountController extends Controller
{
    public function login(Request $request, LoginLocalAccountService $service): \Illuminate\Http\JsonResponse
    {
        try {
            DB::beginTransaction();
            Log::info("Initialize a new login", ['parameters' => $request->all()]);
            Log::debug("Call validator", ['parameters' => $request->all()]);
            $validator = Validator::make([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ], [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
            Log::debug("Check fails", ['parameters' => $request->all()]);
            if ($validator->fails()) {
                $messages = $validator->errors()->all();
                throw new Exception(json_encode($messages), 422);
            }
            Log::debug("Check validated", ['parameters' => $request->all()]);
            $params = $request->only('email', 'password');
            $service->setPassword($params['password']);
            $service->setEmail($params['email']);
            $token = $service->execute();
            Log::info("Finished a new login", ['parameters' => $request->all()]);
            DB::commit();
            return response()->json(['success' => true,
                'access_token' => $token,
                'token_type' => 'Bearer'], HTTP::HTTP_OK);
        } catch (Exception $exception) {
            DB::rollback();
            Log::emergency($exception->getMessage(), ['parameters' => $request->all()]);
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], HTTP::HTTP_BAD_REQUEST);
        }
    }
}
