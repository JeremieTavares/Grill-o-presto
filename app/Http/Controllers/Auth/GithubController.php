<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Trait\RolesAvailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    use RolesAvailable;
    
    public function returnViewToCompleteRegisteration($user) {
        
        $userInfos = User::where('id', $user)->get();
        return view('auth.oAuthRegister', ['userInfos' => $userInfos]);
    }


    public function auth()
    {
        return Socialite::driver('github')->redirect();
    }

    public function redirect()
    {
        $githubUserInfo = Socialite::driver('github')->stateless()->user();
        $roles = new Role;
        $user = User::firstOrCreate(
            [
                'email' => $githubUserInfo->email,

            ],
            [
                'password' => Hash::make(Str::random(24)),
                'role_id' => $roles->get_role_client()
            ]
        );

        Auth::login($user);


        if($user->info_user_id > 0)
            return redirect()->route('home');
        else
            return redirect()->route('github.finish.registeration', ['user' => $user]);

    }
}
