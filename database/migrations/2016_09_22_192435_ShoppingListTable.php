<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShoppingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('shopping_list');
        Schema::create('shopping_list', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->float('quantity', 8, 2);
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('item_id')->references('item_id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shopping_list');
    }
}
