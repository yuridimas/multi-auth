<?php

namespace App\Http\Controllers;

use App\User;
use App\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allUsers = User::all();
        
        $user = User::where('id', Auth::id())
            ->first();
            
        $socialGoogle = SocialAccount::google()
            ->first();
        
        $socialFacebook = SocialAccount::facebook()
            ->first();

        return view('home')
            ->with([
                'socialGoogle' => $socialGoogle,
                'socialFacebook' => $socialFacebook,
                'allUsers' => $allUsers,
                'user' => $user,
            ]);
    }
}
