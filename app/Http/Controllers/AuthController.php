<?php

namespace App\Http\Controllers;

use App\User;
use App\SocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = User::whereIn('is_admin', [1, 0])
            ->get();

        if (empty($user)) {
            return redirect()
                ->route('register')
                ->with('alert-danger', 'You must create account first!');
        } else {

            $social = Socialite::driver($provider)
                ->user();

            $accountSocial = SocialAccount::where('social_id', $social->id)
                ->first();

            if ($accountSocial) {
                $user = User::find($accountSocial->user_id);
            } else {
                $user = User::where('email', $social->email)
                    ->first();
            }

            if ($user) {
                Auth::login($user);

                SocialAccount::firstOrCreate([
                    'user_id' => $user->id,
                    'type' => $provider,
                    'social_id' => $social->id,
                    'name' => $social->name,
                    'email' => $social->email
                ]);

                return redirect('/home');
            } else {
                $user = new User();
                $user->name = $social->name;
                $user->email = $social->email;
                $user->is_admin = 0;
                $user->save();

                SocialAccount::firstOrCreate([
                    'user_id' => $user->id,
                    'type' => $provider,
                    'social_id' => $social->id,
                    'name' => $social->name,
                    'email' => $social->email
                ]);

                Auth::login($user);

                return redirect('/home');
            }
        }
    }
}
