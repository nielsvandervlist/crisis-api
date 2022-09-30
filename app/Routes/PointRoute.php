<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class PointRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/points', [Controller::class, 'index'])->name('points.index');
        Route::get('/points/count', [Controller::class, 'count'])->name('points.count');
        Route::get('/points/{id}', [Controller::class, 'show'])->name('points.show');
        Route::post('/points', [Controller::class, 'store'])->name('points.store');
        Route::put('/points/{id}', [Controller::class, 'update'])->name('points.update');
        Route::put('/points/{id}/restore', [Controller::class, 'restore'])->name('points.restore');
        Route::delete('/points/{id}', [Controller::class, 'destroy'])->name('points.destroy');
        Route::delete('/points/{id}/force', [Controller::class, 'forceDestroy'])->name('points.forceDestroy');
    }
}
