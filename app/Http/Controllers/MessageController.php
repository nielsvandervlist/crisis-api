<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        event(new MessageEvent($request->user, $request->message));
        return 'ok';
    }
}
