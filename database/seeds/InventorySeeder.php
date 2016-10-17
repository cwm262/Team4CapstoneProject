<?php

use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory')->delete();
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '1',
            'quantity' => '12',
            'used' => '4',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '1',
            'quantity' => '6',
            'used' => '10',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '2',
            'quantity' => '10',
            'used' => '2',
            'total' => '12',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '3',
            'quantity' => '16',
            'used' => '0',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '3',
            'quantity' => '0',
            'used' => '16',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '4',
            'quantity' => '10',
            'used' => '6',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '5',
            'quantity' => '1',
            'used' => '5',
            'total' => '6',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '6',
            'quantity' => '2',
            'used' => '6',
            'total' => '8',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '7',
            'quantity' => '8',
            'used' => '0',
            'total' => '8',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '8',
            'quantity' => '14',
            'used' => '2',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '9',
            'quantity' => '2',
            'used' => '0',
            'total' => '2',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '10',
            'quantity' => '0',
            'used' => '16',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '11',
            'quantity' => '16',
            'used' => '0',
            'total' => '16',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '12',
            'quantity' => '10',
            'used' => '0',
            'total' => '10',
        ]);
        
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '13',
            'quantity' => '0',
            'used' => '10',
            'total' => '10',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '14',
            'quantity' => '8',
            'used' => '0',
            'total' => '8',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '14',
            'quantity' => '0',
            'used' => '8',
            'total' => '8',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '15',
            'quantity' => '5',
            'used' => '0',
            'total' => '5',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '16',
            'quantity' => '4.6',
            'used' => '.4',
            'total' => '5',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '17',
            'quantity' => '14',
            'used' => '4',
            'total' => '18',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '18',
            'quantity' => '4',
            'used' => '0',
            'total' => '4',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '19',
            'quantity' => '6',
            'used' => '0',
            'total' => '6',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '19',
            'quantity' => '0',
            'used' => '6',
            'total' => '6',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '19',
            'quantity' => '0',
            'used' => '6',
            'total' => '6',
        ]);
    }
}
