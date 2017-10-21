<?php

use Illuminate\Database\Seeder;
use App\Couleur;

class CouleursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Couleur::Create([
            'code' => '#95181a'
        ]);
        Couleur::Create([
            'code' => '#051e1e'
        ]);
        Couleur::Create([
            'code' => '#27AE60'
        ]);
        Couleur::Create([
            'code' => '#5499C7'
        ]);
        Couleur::Create([
            'code' => '#85929E'
        ]);
        Couleur::Create([
            'code' => '#795548'
        ]);
    }
}
