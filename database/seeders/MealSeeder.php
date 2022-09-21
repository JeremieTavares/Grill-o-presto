<?php

namespace Database\Seeders;

use App\Models\Meal;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $ingredient = [];



        for($i = 0; $i < 5; $i++) {
            array_push($ingredient, $faker->sentence());
        }

        for($i = 0; $i < 30; $i++) {
            Meal::create([
                'name' => $faker->sentence(),
                'ingredients' => json_encode($ingredient),
                'description' => "Bien des gens affectionnent le poulet au beurre; c’est un véritable régal. Sa sauce tomate crémeuse et légèrement épicée en fait un repas accessible, même pour les palais les plus difficiles. Servi avec du riz moelleux et du pain naan chaud, ce plat est réconfortant à souhait!",
                'vegetarian' => $faker->boolean(),
                'gluten_free' => $faker->boolean(),
                'spicy' => $faker->randomNumber(),
                'image_path' => $faker->sentence()
            ]);
        }
    }
}
