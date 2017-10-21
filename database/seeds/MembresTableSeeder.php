<?php

use Illuminate\Database\Seeder;
use App\Association;

class MembresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Association::all()->each(function($asso){
            for ($i=0; $i < 10 ; $i++) {
                $asso->membres()->save(factory(App\Membre::class)->make());
            }
        });
    }
}
