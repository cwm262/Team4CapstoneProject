<?php

use Illuminate\Database\Seeder;

class ShoppingList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shopping_list')->delete();
        DB::table('shopping_list')->insert([
            'id' => '1',
            'item_id' => '2',
            'quantity' => '1',
        ]);
    }
}
