<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('nom');
            $table->string('diminutif', 8);
            $table->string('email');
            $table->integer('couleur_id')->unsigned();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_siteweb')->nullable();
            $table->string('description_courte')->nullable();
            $table->text('description_longue')->nullable();
            $table->string('logo');
            $table->timestamps();
        });

        Schema::table('associations', function($table) {
            $table->foreign('couleur_id')->references('id')->on('couleurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associations');
    }
}
