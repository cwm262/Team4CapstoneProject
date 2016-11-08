<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '19',
            'quantity' => '0',
            'used' => '2',
            'total' => '6',
            'expired' => '4',
        ]);

        //**************These contain inflated values for stats testing/demo*************

        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '19',
            'quantity' => '0',
            'used' => '2',
            'total' => '402',
            'expired' => '400',
            'updated_at' => '2016-11-02 14:30:40',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '19',
            'quantity' => '0',
            'used' => '2',
            'total' => '402',
            'expired' => '400',
            'updated_at' => '2016-10-02 14:30:40',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '18',
            'quantity' => '0',
            'used' => '2',
            'total' => '452',
            'expired' => '450',
            'updated_at' => '2016-09-02 14:30:40',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '17',
            'quantity' => '0',
            'used' => '2',
            'total' => '352',
            'expired' => '350',
            'updated_at' => '2016-08-02 14:30:40',
        ]);

        //for notification testing
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '9',
            'quantity' => '30',
            'used' => '2',
            'total' => '32',
            'expired' => '0',
            'updated_at' => '2016-10-04 14:30:40',
        ]);

        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '9',
            'quantity' => '30',
            'used' => '2',
            'total' => '32',
            'expired' => '0',
            'updated_at' => '2016-10-01 00:00:00',
            //'ignored_at' => '2016-10-27 00:00:00',
            //'ignored_at' => Carbon::create(2016, 10, 27, 0),
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '21',
            'quantity' => '4',
            'used' => '2',
            'total' => '6',
            'expired' => '0',
        ]);
        DB::table('inventory')->insert([
            'user_id' => '1',
            'item_id' => '22',
            'quantity' => '4',
            'used' => '2',
            'total' => '6',
            'expired' => '0',
        ]);











    }
}
