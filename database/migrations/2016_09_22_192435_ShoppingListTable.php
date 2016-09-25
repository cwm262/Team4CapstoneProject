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
        /**Schema::dropIfExists('shopping_list');**/
        Schema::create('shopping_list', function (Blueprint $table) {
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('item_id')->references('item_id')->on('items');
            $table->float('quantity', 8, 2);
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
