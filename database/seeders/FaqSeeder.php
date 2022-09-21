<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question' => "Quoi faire si j'ai des allergies",
            'answer' => "Nous veillons à ce que tous nos aliments soient préparés en toute sécurité. Nous indiquons sur chaque recette les allergènes contenus dans la recette, et nos ingrédients sont pré-dosés dans des emballages individuels, ce qui facilite l'échange d'ingrédients. Cependant, toutes nos boîtes sont assemblées dans la même installation de traitement, ce qui signifie que nous ne pouvons pas garantir qu'il n'y a pas de contamination croisée. Si vous souffrez d'une allergie alimentaire sévère et souhaitez assurer la plus grande prudence, nous vous déconseillons de commander une boîte Goodfood.",
            'faq_theme_id' => 1,
            'user_id' => 4,
            'is_active' => true
        ]);

        Faq::create([
            'question' => "Quel genre de plats offrez vous?",
            'answer' => "Nous offront des plats pour tout les goûts, et pour les petits et les grands",
            'faq_theme_id' => 1,
            'user_id' => 3,
            'is_active' => true
        ]);

        Faq::create([
            'question' => "Quoi faire si j'ai des allergies",
            'answer' => "Nous veillons à ce que tous nos aliments soient préparés en toute sécurité. Nous indiquons sur chaque recette les allergènes contenus dans la recette, et nos ingrédients sont pré-dosés dans des emballages individuels, ce qui facilite l'échange d'ingrédients. Cependant, toutes nos boîtes sont assemblées dans la même installation de traitement, ce qui signifie que nous ne pouvons pas garantir qu'il n'y a pas de contamination croisée. Si vous souffrez d'une allergie alimentaire sévère et souhaitez assurer la plus grande prudence, nous vous déconseillons de commander une boîte Goodfood.",
            'faq_theme_id' => 2,
            'user_id' => 4,
            'is_active' => false
        ]);

        Faq::create([
            'question' => "Quoi faire si j'ai des allergies",
            'answer' => "Nous veillons à ce que tous nos aliments soient préparés en toute sécurité. Nous indiquons sur chaque recette les allergènes contenus dans la recette, et nos ingrédients sont pré-dosés dans des emballages individuels, ce qui facilite l'échange d'ingrédients. Cependant, toutes nos boîtes sont assemblées dans la même installation de traitement, ce qui signifie que nous ne pouvons pas garantir qu'il n'y a pas de contamination croisée. Si vous souffrez d'une allergie alimentaire sévère et souhaitez assurer la plus grande prudence, nous vous déconseillons de commander une boîte Goodfood.",
            'faq_theme_id' => 3,
            'user_id' => 2,
            'is_active' => false
        ]);
    }
}
