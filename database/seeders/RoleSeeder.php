<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        $roleArray = ['Client', 'Admin-1', 'Admin-2', 'Admin-3'];

        foreach($roleArray as $role){
            Role::create([
                'role' => $role
            ]);
        }
    }
}
