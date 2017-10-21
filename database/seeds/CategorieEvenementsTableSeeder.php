<?php

use Illuminate\Database\Seeder;
use App\CategorieEvenement;

class CategorieEvenementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieEvenement::Create([
            'nom' => 'Soiree'
        ]);

        CategorieEvenement::Create([
            'nom' => 'Weekend'
        ]);

        CategorieEvenement::Create([
            'nom' => 'Autre ecole'
        ]);

        CategorieEvenement::Create([
            'nom' => 'Sortie culturelle'
        ]);

        CategorieEvenement::Create([
            'nom' => 'Sortie sportive'
        ]);
    }
}
