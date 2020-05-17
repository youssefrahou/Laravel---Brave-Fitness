<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnviarMensaje implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $texto;
    public $de;
    public $para;
    
    public function __construct($texto, $de, $para)
    {
        $this->texto = $texto;
        $this->de = $de;
        $this->para = $para;
    }

    public function broadcastOn()
    {
        return 'chat-channel';
    }

    public function broadcastAs()
    {
        return 'chat-event';
    }

}