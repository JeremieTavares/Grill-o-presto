<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Order::create([
            'user_id' => 1,
            'prenom' => 'Benoit',
            'nom' => 'On-rails',
            'rue' => 'Du Cégep',
            'no_porte' => '475',
            'appartement' => '2',
            'code_postal' => 'g12-2e4',
            'ville' => 'Shebrooke',
            'telephone' => '819-444-4444',
            'email' => 'client@hotmail.com',
            'menu_id' => 1,
            'prix' => '160',
            'order_number' => '3243242',
            'is_guest' => false,
            'order_status_id' => '2',
            'portion_id' => '2',
            'meals' => json_encode([
                [
                    "name" => "Pate-Chinois",
                    "ingrediants" => ['Patate', 'Boeuf', 'Mais'],
                    "vegetarian" => false,
                    "gluten_free" => "Pate-Chinois",
                    "spicy" => "0",
                    'allergens' => 'Lactose',
                    "image_path" => "./none"
                ], [
                    "name" => "Poulet au beurre",
                    "ingrediants" => ['Poulet', 'Riz', 'Beurre', 'Epices'],
                    "vegetarian" => false,
                    "gluten_free" => "Pate-Chinois",
                    "spicy" => "0",
                    'allergens' => 'Lactose',
                    "image_path" => "./none"
                ]
            ])
        ]);
    }
}
