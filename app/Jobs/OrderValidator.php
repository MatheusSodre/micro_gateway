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
        $this->params['uuid'] = $this->correlationId;
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
