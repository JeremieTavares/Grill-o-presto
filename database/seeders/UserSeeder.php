<?php

namespace Database\Seeders;

use App\Models\Info_user;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userClient = new User();
        
        $userClient->id = 1;
        $userClient->info_user_id = 1;
        $userClient->email = 'client@hotmail.com';
        $userClient->password = Hash::make('clientclient');
        $userClient->role_id = 1;


        $userAdmin = new User();
        
        $userAdmin->id = 2;
        $userAdmin->info_user_id = 2;
        $userAdmin->email = 'admin@hotmail.com';
        $userAdmin->password = Hash::make('adminadmin');
        $userAdmin->role_id = 2;


        $userClient->save();
        $userAdmin->save();
    }
}
