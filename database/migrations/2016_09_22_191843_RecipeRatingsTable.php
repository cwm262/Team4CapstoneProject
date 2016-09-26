<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecipeRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipe_ratings');
        Schema::create('recipe_ratings', function (Blueprint $table) {
            $table->integer('recipe_id')->unsigned();
            $table->integer('id')->unsigned();
            $table->integer('rating');
            $table->foreign('recipe_id')->references('recipe_id')->on('recipes');
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
        Schema::drop('recipe_ratings');
    }
}
