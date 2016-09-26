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
        Schema::dropIfExists('items');
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('barcode')->unique();
            $table->integer('id')->unsigned();
            $table->char('item_name', 100);
            $table->char('measurement', 50);
            $table->float('serving_size', 8, 2);
            $table->float('servings_per_container', 8, 2);
            $table->boolean('type');
            $table->integer('storage');
            $table->integer('expiration');
            $table->boolean('ready_to_eat');
            /**$table->timestamps();**/
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign('id')->references('id')->on('users');
            $table->softDeletes();
            
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
