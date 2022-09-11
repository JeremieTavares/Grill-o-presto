<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\InfoUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OAuthRequest;

class oAuthController extends Controller
{

    public function returnViewToCompleteRegisteration($user)
    {

        $userInfos = User::where('id', $user)->get();
        return view('auth.oAuthRegister', ['userInfos' => $userInfos]);
    }


    public function updateOAuthUser(OAuthRequest $request)
    {

        
        $validatedData = $request->validated();

    
        $userinfos = User::where('email', $request['email'])->get();

        $newUser = InfoUser::create([
            'prenom' => $request['prenom'],
            'nom' => $request['nom'],
            'telephone' => $request['tel'],
            'rue' => $request['rue'],
            'no_porte' => $request['noPorte'],
            'code_postal' => $request['zip-code'],
            'ville' => $request['ville']
        ]);

        $userinfos->toQuery()->update(['info_user_id' => $newUser->id]);

        return redirect('/');
    }
}
