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
            'order_number' => '969478',
            'ticket_type_id' => 2,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 3,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 4,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 1,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 3,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 2,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 1,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 3,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);
        Ticket::create([
            'ticket_number' => '432651',
            'order_number' => '969478',
            'ticket_type_id' => 4,
            'ticket_status_id' => 1,
            'description' => "Salut, je n'ai toujours pas recu ma commande. J'etais supposer la recevoir mardi. Merci",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '774562',
            'order_number' => '251163',
            'ticket_type_id' => 3,
            'ticket_status_id' => 4,
            'description' => "Hi, i cant click on subscribe button. Is it broken?",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '556551',
            'order_number' => '344278',
            'ticket_type_id' => 4,
            'ticket_status_id' => 3,
            'description' => "Lorsque j'essaie de passer une commande, j'ai un erreur 404. Pourquoi?",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '445784',
            'order_number' => '884781',
            'ticket_type_id' => 1,
            'ticket_status_id' => 2,
            'description' => "Salut! lorsque je paye avec VISA ca me dit que ce marchand ne prends pas en charge cette methode de paiement. Pourquoi?",
            'user_id' => 1
        ]);

        Ticket::create([
            'ticket_number' => '123456',
            'order_number' => '654321',
            'ticket_type_id' => 1,
            'ticket_status_id' => 1,
            'description' => "Le pate chinois que j'ai recu etait trop bon... je veux un remboursement",
            'user_id' => 1
        ]);
    }
}
