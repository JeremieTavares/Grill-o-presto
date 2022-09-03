<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\HistoryMeal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HistoryMealSeeder extends Seeder
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
            HistoryMeal::create([
                'name' => $faker->sentence(),
                'ingredients' => json_encode($ingredient),
                'vegetarian' => $faker->boolean(),
                'gluten_free' => $faker->boolean(),
                'spicy' => $faker->randomNumber(),
                'menu_id' => rand(1, 3),
                'image_path' => $faker->sentence()
            ]);
        }

        for($i = 0; $i < 30; $i++) {
            HistoryMeal::create([
                'name' => $faker->sentence(),
                'ingredients' => json_encode($ingredient),
                'vegetarian' => $faker->boolean(),
                'gluten_free' => $faker->boolean(),
                'spicy' => $faker->randomNumber(),
                'menu_id' => 4,
                'image_path' => $faker->sentence()
            ]);
        }
    }
}
