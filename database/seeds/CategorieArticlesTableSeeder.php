<?php

use Illuminate\Database\Seeder;
use App\CategorieArticle;

class CategorieArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieArticle::Create([
            'nom' => 'Evenement'
        ]);

        CategorieArticle::Create([
            'nom' => 'Vie de l\'ecole'
        ]);

        CategorieArticle::Create([
            'nom' => 'Infos'
        ]);

        CategorieArticle::Create([
            'nom' => 'Divers'
        ]);

        CategorieArticle::Create([
            'nom' => 'Important'
        ]);
    }
}
