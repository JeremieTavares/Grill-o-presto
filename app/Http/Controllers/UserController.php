<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\InfoUser;
use Illuminate\Http\Request;
use App\Http\Requests\OAuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use App\Http\Requests\UpdateUserInfoRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $authUserId = (int) Auth::user()->id;

        $userInfo = User::with('infoUser')->where('id', $authUserId)->get();

        return view('user.user-infos', ['user' => $userInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserInfoRequest $request, $id)
    {
        $validatedData = $request->validated();

        $user = User::findOrFail($id);
        $userInfo = InfoUser::where('id', $user->info_user_id)->get();

        if ($request->tel !== $userInfo[0]->telephone) {
            $this->validate(
                $request,

                [
                    'tel' => ['regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/', 'required', 'unique:App\Models\InfoUser,telephone'],
                ],
                [
                    'tel.regex' => 'Le format doit etre (888-888-8888)',
                    'tel.required' => 'Le numéro de téléphone est requis',
                    'tel.unique' => 'Ce numéro est invalide ou existe déja',
                ]
            );
        }

        $user->email = (string) $request->email;
        $user->password = (string) $request->password;
        $userInfo[0]->prenom = (string) $request->prenom;
        $userInfo[0]->nom = (string) $request->nom;
        $userInfo[0]->rue = (string) $request->rue;
        $userInfo[0]->no_porte = (int) $request->noPorte;
        $userInfo[0]->appartement = (int) $request->appartement;
        $userInfo[0]->code_postal = (string) $request->zip_code;
        $userInfo[0]->ville = (string) $request->ville;
        $userInfo[0]->telephone = (string) $request->tel;
        $user->save();
        $userInfo[0]->save();

        return back()->with('successInfosChanged', 'Vos informations on été changé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {


        // Excesive checking making sure someone is not trynna make so sketchy shit
        if (((int)Auth::user()->id === (int) $id) &&
            ((int)$request->active_logged_user === (int)Auth::user()->id) &&
            ((int)$request->active_logged_user === (int) $id)
        ) {
            $user = User::where('id', Auth::user()->id)->get();
            $user[0]->soft_deleted = date('Y-m-d h:i:s');
            $user[0]->save();
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
}