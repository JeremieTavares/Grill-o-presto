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
                'response' => 'Salut! Nous sommes vraiment désolé. Nous allons vous envoyer une nouvelle commande! Merci',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Ok, Merci. J'ai payé par Mastercard. Est-ce possible d'avoir un remboursement sur ce mode de paiement?",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => 'Il est tout a fait possible. Nous offrons sinon un crédit restaurant. Vous serez sur notre liste de priorités pour la livraison. Au plaisir',
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Je preferes un remboursement sur ma carte de crédit. Merci",
                'user_id' => 1,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "D'accord, le remboursement a été effectué. Il sera disponible sur votre solde dici 5-7jours ouvrables.",
                'user_id' => 2,
                'ticket_id' => 1
            ]);

            Message::create([
                'response' => "Merci !",
                'user_id' => 1,
                'ticket_id' => 1
            ]);
            
        }
}
