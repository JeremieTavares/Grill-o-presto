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
        Role::create([
            'role' => 'Client',
        ]);
        Role::create([
            'role' => 'Admin-1',
        ]);
        Role::create([
            'role' => 'Admin-2',
        ]);
        Role::create([
            'role' => 'Admin-3',
        ]);
    }
}
