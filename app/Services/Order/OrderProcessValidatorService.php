<?php

namespace App\Services\Order;

use App\Jobs\OrderValidator;
use App\Shared\SQS;

class OrderProcessValidatorService
{
    private array $payload;
    private string $correlationId;

    /**
     * @throws \Throwable
     */
    public function execute(): \Aws\Result
    {
        throw_if(!$this->getPayload(), new \Exception('Payload not found'));
        throw_if(!$this->getCorrelationId(), new \Exception('Correlation not found'));
        $sqs = new SQS();
        $sqs->setQueueUrl(env('SQS_PREFIX') . '/order-validator-queue');
        $orderValidator = new OrderValidator($this->getPayload(), $this->getCorrelationId());
        $payload = [
            "uuid" => $this->getCorrelationId(),
            "displayName" => "App\\Jobs\\OrderValidator",
            "job" => "Illuminate\\Queue\\CallQueuedHandler@call",
            "maxTries" => 1,
            "maxExceptions" => null,
            "failOnTimeout" => false,
            "backoff" => null,
            "timeout" => null,
            "retryUntil" => null,
            "data" => [
                "commandName" => "App\\Jobs\\OrderValidator",
                "command" => serialize($orderValidator)
            ]
        ];
        return $sqs->sendMessage(json_encode($payload, JSON_UNESCAPED_UNICODE));
    }

    public function setPayload($payload): self
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function setCorrelationId(string $correlationId): self
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    public function getCorrelationId(): string
    {
        return $this->correlationId;
    }
}
