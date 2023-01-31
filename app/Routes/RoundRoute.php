<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class RoundRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/rounds', [Controller::class, 'index'])->name('rounds.index');
        Route::get('/rounds/count', [Controller::class, 'count'])->name('rounds.count');
        Route::get('/rounds/{id}', [Controller::class, 'show'])->name('rounds.show');
        Route::post('/rounds', [Controller::class, 'store'])->name('rounds.store');
        Route::put('/rounds/{id}', [Controller::class, 'update'])->name('rounds.update');
        Route::put('/rounds/{id}/restore', [Controller::class, 'restore'])->name('rounds.restore');
        Route::delete('/rounds/{id}', [Controller::class, 'destroy'])->name('rounds.destroy');
        Route::delete('/rounds/{id}/force', [Controller::class, 'forceDestroy'])->name('rounds.forceDestroy');
    }
}
