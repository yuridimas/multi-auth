<?php

namespace App\Http\Controllers;

use App\User;
use App\SocialAccount;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $user = User::where('id', $userId)
            ->first();

        $socialGoogle = SocialAccount::google()
            ->first();

        $socialFacebook = SocialAccount::facebook()
            ->first();

        return view('home')
            ->with([
                'socialGoogle' => $socialGoogle,
                'socialFacebook' => $socialFacebook,
                'user' => $user,
            ]);
    }

    public function listUser()
    {
        $users = User::all();

        return view('list_users')
            ->with('users', $users);
    }
}
