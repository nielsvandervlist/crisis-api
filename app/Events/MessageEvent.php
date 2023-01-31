<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class MessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $user, $message, $room_id;

    /**
     * @param $user
     * @param $message
     * @param $room_id
     */
    public function __construct($user, $message, $room_id)
    {
        $this->user = $user;
        $this->message = $message;
        $this->room_id = $room_id;
    }

    /**
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'id' => Str::orderedUuid(),
            'user' => $this->user['name'],
            'message' => $this->message,
            'createdAt' => now()->toDateTimeString(),
        ];
    }

    /**
     * @return string
     */
    public function broadcastAs()
    {
        return 'message.new';
    }

    /**
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('chat-room.' . $this->room_id . '.' . $this->user['id']);
    }

    public function handle()
    {
        // Store the message in Redis
        (new \Redis)->rpush('chat-room.'.$this->message['chat_room_id'], json_encode($this->message));
    }
}
