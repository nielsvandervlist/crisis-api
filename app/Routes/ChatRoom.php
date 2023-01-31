<?php

namespace App\Routes;

use App\Http\Controllers\ChatRoomController;
use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class ChatRoom implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/chat_rooms', [Controller::class, 'index'])->name('chat_rooms.index');
        Route::get('/chat_rooms/count', [Controller::class, 'count'])->name('chat_rooms.count');
        Route::get('/chat_rooms/{chatRoom}/join', [ChatRoomController::class, 'join'])->name('chat_rooms.join');
        Route::get('/chat_rooms/{id}', [Controller::class, 'show'])->name('chat_rooms.show');
        Route::post('/chat_rooms', [Controller::class, 'store'])->name('chat_rooms.store');
        Route::put('/chat_rooms/{id}', [Controller::class, 'update'])->name('chat_rooms.update');
        Route::put('/chat_rooms/{id}/restore', [Controller::class, 'restore'])->name('chat_rooms.restore');
        Route::delete('/chat_rooms/{id}', [Controller::class, 'destroy'])->name('chat_rooms.destroy');
        Route::delete('/chat_rooms/{id}/force', [Controller::class, 'forceDestroy'])->name('chat_rooms.forceDestroy');
    }
}
