<?php

namespace Database\Seeders;

use App\Models\AllergenMeal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenMealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergen = [1, 2, 5];  
        for($i = 0; $i < 20; $i++) {
            for($y = 0; $y < 3; $y++) {
          
                AllergenMeal::create([
                    'allergen_id' => rand(0, 5),
                    'meal_id' => $i
                ]);
      
            }

        }

        
    }
}
