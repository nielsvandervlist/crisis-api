<?php

namespace App\Routes;

use Illuminate\Support\Facades\Route;
use Tychovbh\LaravelCrud\Controller;
use Tychovbh\LaravelCrud\Routes\Routes;

class CompanyRoute implements Routes
{
    /**
     * Load User Routes.
     */
    public static function routes()
    {
        Route::get('/companies', [Controller::class, 'index'])->name('companies.index');
        Route::get('/companies/count', [Controller::class, 'count'])->name('companies.count');
        Route::get('/companies/{id}', [Controller::class, 'show'])->name('companies.show');
        Route::post('/companies', [Controller::class, 'store'])->name('companies.store');
        Route::put('/companies/{id}', [Controller::class, 'update'])->name('companies.update');
        Route::put('/companies/{id}/restore', [Controller::class, 'restore'])->name('companies.restore');
        Route::delete('/companies/{id}', [Controller::class, 'destroy'])->name('companies.destroy');
        Route::delete('/companies/{id}/force', [Controller::class, 'forceDestroy'])->name('companies.forceDestroy');
    }
}
