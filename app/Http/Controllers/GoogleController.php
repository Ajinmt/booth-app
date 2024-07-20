<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $finduser = User::where('google_id', $user->getId())->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect()->intended('/userPage');
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'username' => $user->getName(),
                'level' => 'user',
                'email' => $user->getEmail(),
                'google_id' => $user->getId(),
                'password' => bcrypt('1234242')
            ]);

            Auth::login($newUser);
            return redirect()->intended('/userPage');
        }

    }
}
