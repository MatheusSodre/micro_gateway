<?php

namespace App\Http\Controllers\Api\sqs;

use App\Http\Controllers\Controller;
use Aws\Sqs\SqsClient;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HTTP;

class SQSMessagesController extends Controller
{
    public function index(Request $request)
    {
        throw_if(env('APP_ENV') != 'local', new \Exception('Somente em ambiente local'));
        $config = [
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
        ];
        $sqs = new SqsClient($config);
        $queueUrl = env('SQS_PREFIX') . '/order-validator-queue';
        $messages = $sqs->receiveMessage([
            'QueueUrl' => $queueUrl,
            'MaxNumberOfMessages' => 10,
        ])->get('Messages');

        $response = [];
        if (is_null($messages)) {
            $messages = [];
        }
        foreach ($messages as $message) {
            $response[] = ['MessageId' => $message['MessageId'], 'Body' => $message['Body']];
        }
        return response()->json(['success' => true, 'messages' => $response], HTTP::HTTP_OK);
    }
}
