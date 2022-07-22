<?php

namespace App\Events\Chat;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcastNow {
    
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $text;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastAs() {
        return 'Message';
    }

    public function broadcastWith() {

        return [
            'text' => $this->text,
            'id' => 1
        ];
    }
}
