<?php

namespace App\Events;

use http\Env\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransactionReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transaction;
    public $provider;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($transaction, $provider)
    {
        $this->transaction = $transaction;
        $this->provider = $provider;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
