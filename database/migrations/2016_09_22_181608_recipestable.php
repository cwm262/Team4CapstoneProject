<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recipestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipes');
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('recipe_id');
            $table->integer('id')->unsigned();
            $table->char('name', 50);
            $table->longText('instructions');
            $table->float('prep_time', 8, 2);
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipes');
    }
}
