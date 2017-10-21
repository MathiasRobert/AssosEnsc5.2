<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('association_id')->unsigned();
            $table->integer('categorie_id')->unsigned();
            $table->string('titre');
            $table->text('texte')->nullable();
            $table->string('image');
            $table->timestamps();
        });

        Schema::table('articles', function($table) {
            $table->foreign('association_id')->references('id')->on('associations');
            $table->foreign('categorie_id')->references('id')->on('categorie_articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
