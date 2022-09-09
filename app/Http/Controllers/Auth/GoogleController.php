<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{

    public function returnViewToCompleteRegisteration($user) {
        
        $userInfos = User::where('id', $user)->get();
        return view ('auth.oAuthRegister', ['userInfos' => $userInfos]);
    }

    public function auth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirect()
    {
        $googleUserInfo = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            [
                'email' => $googleUserInfo->email,
            ],
            [
                'password' => Hash::make(Str::random(24)),
                'role_id' => User::USER_ROLE_CLIENT
            ]
        );

        Auth::login($user);

        if ($user->info_user_id > 0)
            return redirect()->route('home');
        else
            return redirect()->route('google.finish.registeration', ['user' => $user]);
    }
}
