<?php

use App\Routes\ParticipantRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

ParticipantRoute::webRoutes();

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/test', function () {
    return 'Hello';
});

require __DIR__.'/auth.php';
