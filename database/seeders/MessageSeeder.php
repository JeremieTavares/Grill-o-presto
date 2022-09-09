<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Message::create([
                'response' => 'Salut! Nous sommes vraiment désolé. Nous allons vous rembourser et vous envoyer une nouvelle commande! Merci',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => 'Ok merci. Cest super gentil',
                'user_id' => 1,
                'ticket_id' => 1
            ]);
        }
}
