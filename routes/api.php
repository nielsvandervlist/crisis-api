<?php

use App\Http\Controllers\ChatRoomController;
use App\Routes\ChatRoom;
use App\Routes\CompanyRoute;
use App\Routes\CrisisRoute;
use App\Routes\DocumentRoute;
use App\Routes\MessageRoute;
use App\Routes\NotificationRoute;
use App\Routes\ParticipantRoleRoute;
use App\Routes\ParticipantRoute;
use App\Routes\PostRoute;
use App\Routes\PostTypeRoute;
use App\Routes\RapportRoute;
use App\Routes\ReactionRoute;
use App\Routes\RoundRoute;
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
    RapportRoute::routes();
    TimelineRoute::routes();
    TimelinePostRoute::routes();
    NotificationRoute::routes();
    MessageRoute::routes();
    NotificationRoute::routes();
    RoundRoute::routes();
    DocumentRoute::routes();
    ChatRoom::routes();
});

Route::middleware(['auth:sanctum', 'online'])->get('/user', function (Request $request) {

    $user = $request->user();
    $role = $request->user()->getRoleNames();
    $user->role = $role;

    if($role[0] === 'participant'){
        $participant = \App\Models\Participant::query()->where('user_id', $user->id)->get();
        $user->participant = $participant;
    }

    return $request->user();
});

