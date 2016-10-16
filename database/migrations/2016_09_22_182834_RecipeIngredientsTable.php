<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecipeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipe_ingredients');
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('recipe_id')->unsigned();
            $table->float('quantity', 8, 2);
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade');
            $table->foreign('recipe_id')->references('recipe_id')->on('recipes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipe_ingredients');
    }
}
