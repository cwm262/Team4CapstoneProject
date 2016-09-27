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
            'id' => '1',
            'item_id' => '1',
            'quantity' => '16',
            'used' => '4',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '1',
            'quantity' => '16',
            'used' => '10',
            'expired' => '6',
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '2',
            'quantity' => '12',
            'used' => '2',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '3',
            'quantity' => '16',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '3',
            'quantity' => '16',
            'used' => '16',
            'expired' => '0',
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '4',
            'quantity' => '16',
            'used' => '6',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '5',
            'quantity' => '6',
            'used' => '5',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '6',
            'quantity' => '8',
            'used' => '2',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '7',
            'quantity' => '8',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '8',
            'quantity' => '16',
            'used' => '2',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '9',
            'quantity' => '2',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '10',
            'quantity' => '16',
            'used' => '16',
            'expired' => '0',
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '11',
            'quantity' => '16',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '12',
            'quantity' => '10',
            'used' => '0',
            'expired' => NULL,
        ]);
        
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '13',
            'quantity' => '10',
            'used' => '10',
            'expired' => '0',
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '14',
            'quantity' => '8',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '14',
            'quantity' => '8',
            'used' => '8',
            'expired' => '0',
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '15',
            'quantity' => '5',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '16',
            'quantity' => '5',
            'used' => '.4',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '17',
            'quantity' => '18',
            'used' => '4',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '18',
            'quantity' => '24',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '19',
            'quantity' => '6',
            'used' => '0',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '20',
            'quantity' => '5',
            'used' => '2',
            'expired' => NULL,
        ]);
        DB::table('inventory')->insert([
            'id' => '1',
            'item_id' => '20',
            'quantity' => '5',
            'used' => '5',
            'expired' => '0',
        ]);
    }
}
