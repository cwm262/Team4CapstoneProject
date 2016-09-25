<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**Schema::dropIfExists('items');**/
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->char('name', 50);
            $table->string('measurement', 30);
            $table->float('serving_size', 8, 2);
            $table->float('servings_per_container', 8, 2);
            $table->boolean('type');
            $table->integer('storage');
            $table->integer('expiration');
            $table->string('item_name', 255);
            $table->boolean('ready_to_eat');
            $table->softDeletes();
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
        Schema::drop('items');
    }
}
