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
        /**Schema::dropIfExists('recipes_used');**/
        Schema::create('recipes_used', function (Blueprint $table) {
            $table->integer('recipe_id')->references('recipe_id')->on('recipes');
            $table->integer('user_id')->references('user_id')->on('users');
            $table->integer('quantity');
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
