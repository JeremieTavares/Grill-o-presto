<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Info_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class oAuthController extends Controller
{

    public function updateOAuthUser(Request $request)
    {
        $userinfos = User::where('email', $request['email'])->get();
        
        $newUser = Info_user::create([
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
