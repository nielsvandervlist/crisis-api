<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class ReactionRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/reactions', [Controller::class, 'index'])->name('reactions.index');
        Route::get('/reactions/count', [Controller::class, 'count'])->name('reactions.count');
        Route::get('/reactions/{id}', [Controller::class, 'show'])->name('reactions.show');
        Route::post('/reactions', [Controller::class, 'store'])->name('reactions.store');
        Route::put('/reactions/{id}', [Controller::class, 'update'])->name('reactions.update');
        Route::put('/reactions/{id}/restore', [Controller::class, 'restore'])->name('reactions.restore');
        Route::delete('/reactions/{id}', [Controller::class, 'destroy'])->name('reactions.destroy');
        Route::delete('/reactions/{id}/force', [Controller::class, 'forceDestroy'])->name('reactions.forceDestroy');
    }
}
