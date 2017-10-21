<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            // $table->integer('article_id')->unsigned();

            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');


            $table->integer('user_id')->unsigned();
            $table->text('texte')->nullable();
            $table->timestamps();
        });

        Schema::table('comments', function($table) {
            // $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
