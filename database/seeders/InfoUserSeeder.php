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
        
 
        $adminInfo = new InfoUser();

        $adminInfo->id = 2;
        $adminInfo->prenom = 'Johnny';
        $adminInfo->nom = 'Crying';
        $adminInfo->telephone = '819-992-2299';
        $adminInfo->rue = 'Du Cégep';
        $adminInfo->no_porte = '475';
        $adminInfo->code_postal = 'A1B-2C3';
        $adminInfo->ville = 'Sherbrooke';
        
   

        $userInfosBlocked = new InfoUser();

        $userInfosBlocked->id = 3;
        $userInfosBlocked->prenom = 'Blocked';
        $userInfosBlocked->nom = 'Blocked';
        $userInfosBlocked->telephone = '819-992-2119';
        $userInfosBlocked->rue = 'Du Cégep';
        $userInfosBlocked->no_porte = '475';
        $userInfosBlocked->code_postal = 'A1B-2C3';
        $userInfosBlocked->ville = 'Sherbrooke';
        
  

        $userInfosDeleted = new InfoUser();

        $userInfosDeleted->id = 4;
        $userInfosDeleted->prenom = 'Deleted';
        $userInfosDeleted->nom = 'Deleted';
        $userInfosDeleted->telephone = '819-992-2119';
        $userInfosDeleted->rue = 'Du Cégep';
        $userInfosDeleted->no_porte = '475';
        $userInfosDeleted->code_postal = 'A1B-2C3';
        $userInfosDeleted->ville = 'Sherbrooke';
        

        $userClientInfo->save();
        $userInfosBlocked->save();
        $adminInfo->save();
        $userInfosDeleted->save();
    }
}
