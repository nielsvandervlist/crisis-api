<?php

namespace App\Http\Controllers;

use App\Events\ChatRoomEvent;
use App\Events\ChatRoomJoined;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function join($chatRoom)
    {
        $room = ChatRoom::where([
            'user_id' => auth()->user()->id,
            'participant_id' => $chatRoom,
        ])->firstOr(function () use ($chatRoom) {
            $newRoom = ChatRoom::factory()->create([
                'user_id' => auth()->user()->id,
                'name' => 'chat-room-' . $chatRoom,
                'participant_id' => $chatRoom
            ]);

            $newRoom->save();
            event(new ChatRoomEvent($newRoom, $newRoom->user_id, 'create'));

            return $newRoom;
        });

        return event(new ChatRoomJoined($room, auth()->user()->id));
    }
}
