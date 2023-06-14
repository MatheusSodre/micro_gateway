<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderProcessValidatorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as HTTP;

class OrderController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            Log::info('Initialize order validator process', ['parameters' => $request->all()]);
            Log::debug('Call header from request to get Idempotency');
            $idempotency = $request->header('Idempotency-Key');
            Log::debug('Call OrderProcessValidatorService', ['Idempotency-Key' => $idempotency, 'parameters' => $request->all()]);
            $service = new OrderProcessValidatorService();
            Log::debug('Set setCorrelationId with Idempotency');
            $service->setCorrelationId($idempotency);
            Log::debug('Set setPayload from request');
            $service->setPayload($request->all());
            Log::debug('call execute from OrderProcessValidatorService');
            $sqs = $service->execute();
            Log::info('Finished OrderProcessValidatorService', ['Idempotency-Key' => $idempotency, 'parameters' => $request->all()]);
            return response()->json(['success' => true, 'id' => $sqs->get('MessageId')], HTTP::HTTP_OK);
        } catch (\Exception|\Throwable $exception) {
            Log::emergency('', ['parameters' => $request->all(), 'error' => $exception->getMessage()]);
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], HTTP::HTTP_BAD_REQUEST);
        }
    }
}
