<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionFamillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_familles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('association_id')->unsigned();
            $table->integer('famille_id')->unsigned();
            $table->string('qui');
            $table->string('quoi');
            $table->dateTime('quand');
            $table->integer('points');
            $table->timestamps();
        });

        Schema::table('action_familles', function($table) {
            $table->engine = 'InnoDB';

            $table->foreign('association_id')->references('id')->on('associations');
            $table->foreign('famille_id')->references('id')->on('familles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_familles');
    }
}
