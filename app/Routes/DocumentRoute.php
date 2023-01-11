<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class DocumentRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/documents', [Controller::class, 'index'])->name('documents.index');
        Route::get('/documents/count', [Controller::class, 'count'])->name('documents.count');
        Route::get('/documents/{id}', [Controller::class, 'show'])->name('documents.show');
        Route::post('/documents', [Controller::class, 'store'])->name('documents.store');
        Route::put('/documents/{id}', [Controller::class, 'update'])->name('documents.update');
        Route::put('/documents/{id}/restore', [Controller::class, 'restore'])->name('documents.restore');
        Route::delete('/documents/{id}', [Controller::class, 'destroy'])->name('documents.destroy');
        Route::delete('/documents/{id}/force', [Controller::class, 'forceDestroy'])->name('documents.forceDestroy');
    }
}
