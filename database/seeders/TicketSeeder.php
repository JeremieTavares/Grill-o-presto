<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'ticket_number' => '432651',
            'ticket_type_id' => 2,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
    }
}
