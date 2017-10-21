<?php

use Illuminate\Database\Seeder;

use App\Evenement;
use App\Article;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evenement::all()->each(function($event){
        	for ($i=0; $i < 5 ; $i++) { 
        		$event->comments()->save(factory(App\Comment::class)->make());
        	}
        });

        Article::all()->each(function($article){
        	for ($i=0; $i < 5 ; $i++) { 
        		$article->comments()->save(factory(App\Comment::class)->make());
        	}
        });

        foreach (Comment::all() as $comment) {
            // echo rand(0,2);
            for ($i=0; $i < rand(0,3) ; $i++) { 
                $comment->comments()->save(factory(App\Comment::class)->make());
            }
        }
    }
}
