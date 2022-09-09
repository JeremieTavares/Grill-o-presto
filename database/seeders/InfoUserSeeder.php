<?php

namespace Database\Seeders;

use App\Models\Info_user;
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
        $userClientInfo = new Info_user();

        $userClientInfo->id = 1;
        $userClientInfo->prenom = 'Benoit';
        $userClientInfo->nom = 'bigBrain';
        $userClientInfo->telephone = '819-992-2299';
        $userClientInfo->rue = 'Du Cégep';
        $userClientInfo->no_porte = '475';
        $userClientInfo->code_postal = 'A1B-2C3';
        $userClientInfo->ville = 'Sherbrooke';
        
        $userClientInfo->save();
    }
}
