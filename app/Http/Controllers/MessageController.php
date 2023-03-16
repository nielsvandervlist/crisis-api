<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redis;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        Redis::lpush('chat-room_'.$request->room_id, $request->message);
        return event(new MessageEvent($request->user, $request->message, $request->room_id));
    }

    public function show($id): \Illuminate\Http\JsonResponse|array
    {
        $key = 'chat-room_' . $id;
        $chat_messages = Redis::lrange($key, 0, -1);
        return response()->json($chat_messages);
    }
}
