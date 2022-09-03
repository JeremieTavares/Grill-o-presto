<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Info_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        // **** A REMETTRE ***
        // CECI EMPECHAIT DALLER SUR REGISTER SI ON EST LOG
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $infoUser = Info_user::create([
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'telephone' => $data['tel'],
            'rue' => $data['rue'],
            'no_porte' => $data['noPorte'],
            'code_postal' => $data['zip-code'],
            'ville' => $data['ville']
        ]);
 
         $user = User::create([
            'info_user_id' => $infoUser->id,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => empty($data['role']) ? User::USER_ROLE_CLIENT : $data['role'],
           
        ]);

         return $user;

    }
}
