<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DispatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $class_to_create;
    private array $payload;
    private string $idempotency;

    public function __construct($class_to_create, $payload, $idempotency)
    {
        $this->class_to_create = $class_to_create;
        $this->payload = $payload;
        $this->idempotency = $idempotency;
    }

    public function handle(): void
    {
        dispatch(new $this->class_to_create($this->payload, $this->idempotency));
    }
}
