<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class PostTypeRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/post_types', [Controller::class, 'index'])->name('post_types.index');
        Route::get('/post_types/count', [Controller::class, 'count'])->name('post_types.count');
        Route::get('/post_types/{id}', [Controller::class, 'show'])->name('post_types.show');
        Route::post('/post_types', [Controller::class, 'store'])->name('post_types.store');
        Route::put('/post_types/{id}', [Controller::class, 'update'])->name('post_types.update');
        Route::put('/post_types/{id}/restore', [Controller::class, 'restore'])->name('post_types.restore');
        Route::delete('/post_types/{id}', [Controller::class, 'destroy'])->name('post_types.destroy');
        Route::delete('/post_types/{id}/force', [Controller::class, 'forceDestroy'])->name('post_types.forceDestroy');
    }
}
