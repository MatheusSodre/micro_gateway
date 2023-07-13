<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response as HttpResponse;


class OrderController extends Controller
{
    public function __construct() 
    {
        $this->middleware('permission:send_order')->only('sendPayload');
    }
    /**
     * Display a listing of the resource.
     */
    public function sendPayload(Request $request): JsonResponse
    {
        try {
            Log::info('Initialize order validator process', ['parameters' => $request->all()]);
            Log::debug('Call header from request to get Idempotency');
            return response()->json(['success' => true, 'id' => '10'], HttpResponse::HTTP_OK);
        } catch (\Exception|\Throwable $exception) {
            Log::emergency('', ['parameters' => $request->all(), 'error' => $exception->getMessage()]);
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], HttpResponse::HTTP_BAD_REQUEST);
        }

    }
}

