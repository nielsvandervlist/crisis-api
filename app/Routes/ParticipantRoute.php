<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class ParticipantRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/participants', [Controller::class, 'index'])->name('participants.index');
        Route::get('/participants/count', [Controller::class, 'count'])->name('participants.count');
        Route::get('/participants/{id}', [Controller::class, 'show'])->name('participants.show');
        Route::post('/participants', [Controller::class, 'store'])->name('participants.store');
        Route::put('/participants/{id}', [Controller::class, 'update'])->name('participants.update');
        Route::put('/participants/{id}/restore', [Controller::class, 'restore'])->name('participants.restore');
        Route::delete('/participants/{id}', [Controller::class, 'destroy'])->name('participants.destroy');
        Route::delete('/participants/{id}/force', [Controller::class, 'forceDestroy'])->name('participants.forceDestroy');
    }
}
