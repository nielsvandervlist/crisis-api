<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class NotificationRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/notifications', [Controller::class, 'index'])->name('notifications.index');
        Route::get('/notifications/count', [Controller::class, 'count'])->name('notifications.count');
        Route::get('/notifications/{id}', [Controller::class, 'show'])->name('notifications.show');
        Route::post('/notifications', [Controller::class, 'store'])->name('notifications.store');
        Route::put('/notifications/{id}', [Controller::class, 'update'])->name('notifications.update');
        Route::put('/notifications/{id}/restore', [Controller::class, 'restore'])->name('notifications.restore');
        Route::delete('/notifications/{id}', [Controller::class, 'destroy'])->name('notifications.destroy');
        Route::delete('/notifications/{id}/force', [Controller::class, 'forceDestroy'])->name('notifications.forceDestroy');
    }
}
