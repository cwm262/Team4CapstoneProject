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
        Schema::dropIfExists('inventory');
        Schema::create('inventory', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->float('quantity', 8, 2);
            $table->float('used', 8, 2);
            $table->float('expired', 8, 2)->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::drop('inventory');
    }
}
