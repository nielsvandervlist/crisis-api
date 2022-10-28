<?php

namespace App\Routes;

use App\Models\AppPermission;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class PostRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::middleware('role:admin|participant')->group(function () {
            Route::get('/posts', [Controller::class, 'index'])->name('posts.index');
            Route::get('/posts/count', [Controller::class, 'count'])->name('posts.count');
            Route::get('/posts/{id}', [Controller::class, 'show'])->name('posts.show');
            Route::post('/posts', [Controller::class, 'store'])->name('posts.store');
            Route::put('/posts/{id}', [Controller::class, 'update'])->name('posts.update');
            Route::put('/posts/{id}/restore', [Controller::class, 'restore'])->name('posts.restore');
            Route::delete('/posts/{id}', [Controller::class, 'destroy'])->name('posts.destroy');
            Route::delete('/posts/{id}/force', [Controller::class, 'forceDestroy'])->name('posts.forceDestroy');
        });
    }
}
