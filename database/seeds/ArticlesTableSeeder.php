<?php

use Illuminate\Database\Seeder;

use App\Association;

class ArticlesTableSeeder extends Seeder
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
	        		$asso->articles()->save(factory(App\Article::class)->make());
	        	}
	    });
	    
   	}
}
