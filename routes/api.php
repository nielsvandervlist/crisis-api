<?php

use App\Routes\CompanyRoute;
use App\Routes\CrisisRoute;
use App\Routes\MessageRoute;
use App\Routes\NotificationRoute;
use App\Routes\ParticipantRoleRoute;
use App\Routes\ParticipantRoute;
use App\Routes\PostRoute;
use App\Routes\PostTypeRoute;
use App\Routes\RapportRoute;
use App\Routes\ReactionRoute;
use App\Routes\ReactionTypeRoute;
use App\Routes\TimelinePostRoute;
use App\Routes\TimelineRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['auth:sanctum']], function () {
    CompanyRoute::routes();
    CrisisRoute::routes();
    ParticipantRoute::routes();
    ParticipantRoleRoute::routes();
    PostTypeRoute::routes();
    PostRoute::routes();
    ReactionRoute::routes();
    ReactionTypeRoute::routes();
    RapportRoute::routes();
    TimelineRoute::routes();
    TimelinePostRoute::routes();
    NotificationRoute::routes();
    MessageRoute::routes();
});

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

