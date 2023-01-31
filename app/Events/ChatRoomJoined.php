<?php

namespace App\Events;

use App\Models\ChatRoom;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRoomJoined
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ChatRoom $chatRoom;
    public int $userId;

    public function __construct(ChatRoom $chatRoom, $userId)
    {
        $this->chatRoom = $chatRoom;
        $this->userId = $userId;
    }

    public function handle()
    {
        broadcast(new ChatRoomEvent($this->chatRoom, $this->userId, 'joined'));
    }
}
