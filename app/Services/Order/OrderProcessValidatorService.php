<?php

namespace App\Services\Order;

use App\Jobs\DispatchJob;

class OrderProcessValidatorService
{
    private array $payload;
    private string $correlationId;

    /**
     * @throws \Throwable
     */
    public function execute(): void
    {
        throw_if(!$this->getPayload(), new \Exception('Payload not found'));
        throw_if(!$this->getCorrelationId(), new \Exception('Correlation not found'));
        DispatchJob::dispatch("OrderValidator", $this->getPayload(), $this->getCorrelationId())->onConnection('sqs')->onQueue('order-validator-queue');
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
