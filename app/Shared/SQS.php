<?php

namespace App\Shared;

use Aws\Sqs\SqsClient;
use Illuminate\Support\Facades\Config;

class SQS
{
    private string $queueUrl;
    private SqsClient $sqs;

    public function __construct()
    {
        $this->sqs = new SqsClient([
            'credentials' => Config::get('aws.credentials'),
            'region' => Config::get('aws.region'),
            'version' => 'latest',
            'endpoint' => Config::get('aws.endpoint')
        ]);
    }

    /**
     * @throws \Throwable
     */
    private function isJsonStringValid(string $jsonString): bool
    {
        $decoded = json_decode($jsonString);
        return $decoded !== null && json_last_error() === JSON_ERROR_NONE;
    }

    public function sendMessage(string $payload): \Aws\Result
    {
        throw_if(!$this->queueUrl, new \Exception('Queue URL not set'));
        throw_if(!$this->isJsonStringValid($payload), new \Exception('Payload invalid'));
        return $this->sqs->sendMessage([
            'QueueUrl' => $this->queueUrl,
            'MessageBody' => $payload,
        ]);
    }

    public function setQueueUrl(string $queueUrl): self
    {
        $this->queueUrl = $queueUrl;
        return $this;
    }

    public function getQueueUrl(): string
    {
        return $this->queueUrl;
    }
}
