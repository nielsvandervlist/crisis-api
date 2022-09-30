<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class ReactionTypeRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/reaction_types', [Controller::class, 'index'])->name('reaction_types.index');
        Route::get('/reaction_types/count', [Controller::class, 'count'])->name('reaction_types.count');
        Route::get('/reaction_types/{id}', [Controller::class, 'show'])->name('reaction_types.show');
        Route::post('/reaction_types', [Controller::class, 'store'])->name('reaction_types.store');
        Route::put('/reaction_types/{id}', [Controller::class, 'update'])->name('reaction_types.update');
        Route::put('/reaction_types/{id}/restore', [Controller::class, 'restore'])->name('reaction_types.restore');
        Route::delete('/reaction_types/{id}', [Controller::class, 'destroy'])->name('reaction_types.destroy');
        Route::delete('/reaction_types/{id}/force', [Controller::class, 'forceDestroy'])->name('reaction_types.forceDestroy');
    }
}
