<?php

namespace App\Events;

use App\Models\ChatRoom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRoomEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ChatRoom $chatRoom;
    public int $userId;
    public $action;

    public function __construct(ChatRoom $chatRoom, $userId, $action)
    {
        $this->chatRoom = $chatRoom;
        $this->userId = $userId;
        $this->action = $action;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('chat-room.' . $this->chatRoom->participant_id . '.' . $this->userId);
    }
}
