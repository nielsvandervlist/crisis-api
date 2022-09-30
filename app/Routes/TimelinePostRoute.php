<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class TimelinePostRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/timeline_posts', [Controller::class, 'index'])->name('timeline_posts.index');
        Route::get('/timeline_posts/count', [Controller::class, 'count'])->name('timeline_posts.count');
        Route::get('/timeline_posts/{id}', [Controller::class, 'show'])->name('timeline_posts.show');
        Route::post('/timeline_posts', [Controller::class, 'store'])->name('timeline_posts.store');
        Route::put('/timeline_posts/{id}', [Controller::class, 'update'])->name('timeline_posts.update');
        Route::put('/timeline_posts/{id}/restore', [Controller::class, 'restore'])->name('timeline_posts.restore');
        Route::delete('/timeline_posts/{id}', [Controller::class, 'destroy'])->name('timeline_posts.destroy');
        Route::delete('/timeline_posts/{id}/force', [Controller::class, 'forceDestroy'])->name('timeline_posts.forceDestroy');
    }
}
