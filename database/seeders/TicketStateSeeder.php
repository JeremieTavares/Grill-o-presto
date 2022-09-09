<?php

namespace Database\Seeders;

use App\Models\TicketState;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        $stateArray = ['Ouvert', 'Fermé', 'Expiré', 'Non-résolu'];

        foreach($stateArray as $state){
            TicketState::create([
                'state' => $state
            ]);
        }
    }
}
