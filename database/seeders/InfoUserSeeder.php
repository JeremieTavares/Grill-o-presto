<?php

namespace Database\Seeders;


use App\Models\InfoUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InfoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userClientInfo = new InfoUser();

        $userClientInfo->id = 1;
        $userClientInfo->prenom = 'Benoit';
        $userClientInfo->nom = 'On-Rails';
        $userClientInfo->telephone = '819-992-2299';
        $userClientInfo->rue = 'Du Cégep';
        $userClientInfo->no_porte = '475';
        $userClientInfo->code_postal = 'A1B-2C3';
        $userClientInfo->ville = 'Sherbrooke';
        
        $userClientInfo->save();


        $adminInfo = new InfoUser();

        $adminInfo->id = 2;
        $adminInfo->prenom = 'Johnny';
        $adminInfo->nom = 'Crying';
        $adminInfo->telephone = '819-992-2299';
        $adminInfo->rue = 'Du Cégep';
        $adminInfo->no_porte = '475';
        $adminInfo->code_postal = 'A1B-2C3';
        $adminInfo->ville = 'Sherbrooke';
        
        $adminInfo->save();
    }
}
