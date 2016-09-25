<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventorytable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**Schema::dropIfExists('inventory');**/
        Schema::create('inventory', function (Blueprint $table) {
            $table->integer('user_id')->references('id')->on('users');
            $table->integer('item_id')->references('item_id')->on('items');
            $table->float('quantity', 8, 2);
            $table->float('used', 8, 2);
            $table->boolean('expired');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventory');
    }
}
