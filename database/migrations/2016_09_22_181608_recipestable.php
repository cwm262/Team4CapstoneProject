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
        /**Schema::dropIfExists('recipes');**/
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('recipe_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->char('name', 50);
            $table->longText('instructions');
            $table->float('prep_time', 8, 2);
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
