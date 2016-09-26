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
        /**Schema::dropIfExists('recipe_ratings');**/
        Schema::create('recipe_ratings', function (Blueprint $table) {
            $table->integer('recipe_id')->references('recipe_id')->on('recipes');
            $table->integer('id')->references('id')->on('users');
            $table->integer('rating');
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
