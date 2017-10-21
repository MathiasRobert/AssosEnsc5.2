<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('association_id')->unsigned();
            $table->string('nom');
            $table->string('prenom');
            $table->string('poste');
            $table->string('surnom')->nullable();
            $table->string('email');
            $table->string('lien_facebook')->nullable();
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        Schema::table('membres', function($table) {
            $table->foreign('association_id')->references('id')->on('associations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membres');
    }
}
