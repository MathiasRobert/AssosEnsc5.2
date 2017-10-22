<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('google_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar');
            $table->string('promo')->nullable();
            $table->string('td')->nullable();
            $table->integer('famille_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->engine = 'InnoDB';

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
        Schema::dropIfExists('users');
    }
}
