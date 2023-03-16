<?php

namespace App\Routes;

use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class TimelineRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/timelines', [Controller::class, 'index'])->name('timelines.index');
        Route::get('/timelines/count', [Controller::class, 'count'])->name('timelines.count');
        Route::get('/timelines/{id}', [Controller::class, 'show'])->name('timelines.show');
        Route::get('/timelines/{id}/run', [TimelineController::class, 'run'])->name('timelines.run');
        Route::post('/timelines', [Controller::class, 'store'])->name('timelines.store');
        Route::put('/timelines/{id}', [Controller::class, 'update'])->name('timelines.update');
        Route::put('/timelines/{id}/restore', [Controller::class, 'restore'])->name('timelines.restore');
        Route::delete('/timelines/{id}', [Controller::class, 'destroy'])->name('timelines.destroy');
        Route::delete('/timelines/{id}/force', [Controller::class, 'forceDestroy'])->name('timelines.forceDestroy');
    }
}
