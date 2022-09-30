<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class CrisisRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/crises', [Controller::class, 'index'])->name('crises.index');
        Route::get('/crises/count', [Controller::class, 'count'])->name('crises.count');
        Route::get('/crises/{id}', [Controller::class, 'show'])->name('crises.show');
        Route::post('/crises', [Controller::class, 'store'])->name('crises.store');
        Route::put('/crises/{id}', [Controller::class, 'update'])->name('crises.update');
        Route::put('/crises/{id}/restore', [Controller::class, 'restore'])->name('crises.restore');
        Route::delete('/crises/{id}', [Controller::class, 'destroy'])->name('crises.destroy');
        Route::delete('/crises/{id}/force', [Controller::class, 'forceDestroy'])->name('crises.forceDestroy');
    }
}
