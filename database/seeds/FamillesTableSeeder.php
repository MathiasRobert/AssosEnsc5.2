<?php

use Illuminate\Database\Seeder;
use App\Famille;

class FamillesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Famille::create([
            'id'=> 1,
            'nom'  => "Jaune",
            'points'  => "1000",
            'logo'  => null,
        ]);
        Famille::create([
            'id'=> 2,
            'nom'  => "Bleu",
            'points'  => "800",
            'logo'  => null,
        ]);
        Famille::create([
            'id'=> 3,
            'nom'  => "Vert",
            'points'  => "700",
            'logo'  => null,
        ]);
        Famille::create([
            'id'=> 4,
            'nom'  => "Orange",
            'points'  => "300",
            'logo'  => null,
        ]);
        Famille::create([
            'id'=> 5,
            'nom'  => "Rouge",
            'points'  => "100",
            'logo'  => null,
        ]);
    }
}
