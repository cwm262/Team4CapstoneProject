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
    }
}
