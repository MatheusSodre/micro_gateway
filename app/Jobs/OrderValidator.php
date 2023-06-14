<?php

namespace App\Jobs;
class OrderValidator
{
    public $params;
    public $correlationId;
    public $connection;
    public $queue;

    public function __construct($params, $correlationId)
    {
        $this->params = $params;
        $this->correlationId = $correlationId;
        $this->connection = 'sqs';
        $this->queue = 'order-validator-queue';
    }
    public function serialize()
    {
        return serialize([
            'params' => $this->params,
            'correlationId' => $this->correlationId,
            'connection' => $this->connection,
            'queue' => $this->queue,
        ]);
    }
}
