<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * @param Request $request
     * @param string $hash
     */
    public function showByHash(Request $request, string $hash)
    {
        if (!$hash) {
            return false;
        }

        try {
            $participant = Participant::params(['hash' => $hash])->firstOrFail();
            $user = User::query()->where('email', $participant->email)->get()->toArray();
            $user = User::find($user[0]['id']);
            Auth::login($user);

            return redirect()->away( 'http://localhost:3000/profile');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
//            return Inertia::render('NotFound');
        }
    }
}
