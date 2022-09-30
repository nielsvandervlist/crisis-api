<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class ParticipantRoleRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/participant_roles', [Controller::class, 'index'])->name('participant_roles.index');
        Route::get('/participant_roles/count', [Controller::class, 'count'])->name('participant_roles.count');
        Route::get('/participant_roles/{id}', [Controller::class, 'show'])->name('participant_roles.show');
        Route::post('/participant_roles', [Controller::class, 'store'])->name('participant_roles.store');
        Route::put('/participant_roles/{id}', [Controller::class, 'update'])->name('participant_roles.update');
        Route::put('/participant_roles/{id}/restore', [Controller::class, 'restore'])->name('participant_roles.restore');
        Route::delete('/participant_roles/{id}', [Controller::class, 'destroy'])->name('participant_roles.destroy');
        Route::delete('/participant_roles/{id}/force', [Controller::class, 'forceDestroy'])->name('participant_roles.forceDestroy');
    }
}
