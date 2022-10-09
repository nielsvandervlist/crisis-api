<?php

namespace App\Routes;

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Routes\Routes;

class MessageRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    }
}
