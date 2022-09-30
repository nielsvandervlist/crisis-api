<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class RapportRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/rapports', [Controller::class, 'index'])->name('rapports.index');
        Route::get('/rapports/count', [Controller::class, 'count'])->name('rapports.count');
        Route::get('/rapports/{id}', [Controller::class, 'show'])->name('rapports.show');
        Route::post('/rapports', [Controller::class, 'store'])->name('rapports.store');
        Route::put('/rapports/{id}', [Controller::class, 'update'])->name('rapports.update');
        Route::put('/rapports/{id}/restore', [Controller::class, 'restore'])->name('rapports.restore');
        Route::delete('/rapports/{id}', [Controller::class, 'destroy'])->name('rapports.destroy');
        Route::delete('/rapports/{id}/force', [Controller::class, 'forceDestroy'])->name('rapports.forceDestroy');
    }
}
