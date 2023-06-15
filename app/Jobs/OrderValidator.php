<?php

namespace App\Jobs;
//Base
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
        if (!isset($this->params['uuid'])) {
            $this->params['uuid'] = $this->correlationId;
        }
        return serialize([
            'params' => $this->params,
            'correlationId' => $this->correlationId,
            'connection' => $this->connection,
            'queue' => $this->queue,
        ]);
    }
}
