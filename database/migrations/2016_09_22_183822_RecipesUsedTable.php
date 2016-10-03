<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecipesUsedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipes_used');
        Schema::create('recipes_used', function (Blueprint $table) {
            $table->integer('recipe_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('quantity');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('recipe_id')->references('recipe_id')->on('recipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipes_used');
    }
}
