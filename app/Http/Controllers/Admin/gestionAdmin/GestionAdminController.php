<?php

namespace App\Http\Controllers\Admin\gestionAdmin;

use App\Models\Role;
use App\Models\User;
use App\Models\InfoUser;
use Illuminate\Http\Request;
use App\Http\Requests\OAuthRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserInfoRequest;

class GestionAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::getAllAdmin();
        return view('admin.gestionAdmin.admin-index', ['admins' => $admins]);
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
    public function store(OAuthRequest $request)
    {
        $validatedData = $request->validated();

        $infoUser = InfoUser::create([
            'prenom' => $request->prenom,
            'nom' =>  $request->nom,
            'telephone' =>  $request->tel,
            'rue' =>  $request->rue,
            'no_porte' =>  $request->noPorte,
            'code_postal' =>  $request->zip_code,
            'ville' =>  $request->ville
        ]);

        $user = User::create([
            'info_user_id' => $infoUser->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' =>  $request->roleRadio,
        ]);
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

     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $admins = User::getAllAdmin();
        $admin = User::getUserWithInfo($request->selectAdmin)->first();
        return view('admin.gestionAdmin.admin-edit', ['admins' => $admins, 'selectedAdmin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserInfoRequest $request)
    {
        $validatedData = $request->validated();

        $admin = (object) User::where('id', $request->user_id)->first();
        $role = Role::where("role", $request->roleRadio)->first();
        $adminInfo = InfoUser::where('id', (int) $admin->info_user_id)->first();

        if ($request->tel !== $adminInfo->telephone) {
            $response = $this->validate(
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
        if ($request->email !== $admin->email) {
            $response = $this->validate(
                $request,

                [
                    'email' => ['unique:App\Models\User,email'],
                ],
                [
                    'email.unique' => 'Ce email est invalide ou existe déja',
                ]
            );
        }

        $admin->email = (string) $request->email;
        $admin->role_id = (string) $role->id;
        $admin->password = (string) $request->password;
        $adminInfo->prenom = (string) $request->prenom;
        $adminInfo->nom = (string) $request->nom;
        $adminInfo->rue = (string) $request->rue;
        $adminInfo->no_porte = (int) $request->noPorte;
        $adminInfo->appartement = (int) $request->appartement;
        $adminInfo->code_postal = (string) $request->zip_code;
        $adminInfo->ville = (string) $request->ville;
        $adminInfo->telephone = (string) $request->tel;
        $admin->save();
        $adminInfo->save();

        return back()->with('successInfosChanged', 'Les informations on été changé');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
