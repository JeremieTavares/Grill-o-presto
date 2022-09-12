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
        $userClient->info_user_id = 3;
        $userClient->email = 'client@hotmail.com';
        $userClient->password = Hash::make('clientclient');
        $userClient->role_id = 1;


        $userAdmin = new User();
        
        $userAdmin->id = 2;
        $userAdmin->info_user_id = 4;
        $userAdmin->email = 'admin@hotmail.com';
        $userAdmin->password = Hash::make('adminadmin');
        $userAdmin->role_id = 2;


        $userBlocked = new User();
        
        $userBlocked->id = 3;
        $userBlocked->info_user_id = 2;
        $userBlocked->email = 'blocked@blocked.com';
        $userBlocked->blocked_at = '2022-09-11 20:01:21';
        $userBlocked->password = Hash::make('blockedblocked');
        $userBlocked->role_id = 1;


        $userDeleted = new User();
        
        $userDeleted->id = 4;
        $userDeleted->info_user_id = 1;
        $userDeleted->email = 'deleted@deleted.com';
        $userDeleted->soft_deleted = '2022-09-11 20:01:21';
        $userDeleted->password = Hash::make('deleteddeleted');
        $userDeleted->role_id = 1;


        $userClient->save();
        $userAdmin->save();
        $userBlocked->save();
        $userDeleted->save();
    }
}
