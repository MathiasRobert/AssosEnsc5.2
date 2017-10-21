<?php

use Illuminate\Database\Seeder;

use App\Association;

class EvenementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Association::all()->each(function($asso){
        	for ($i=0; $i < 6 ; $i++) { 
        		$asso->evenements()->save(factory(App\Evenement::class)->make());
        	}
        });
    }
}
