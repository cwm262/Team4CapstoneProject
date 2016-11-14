<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        DB::table('items')->insert([
            'barcode' => '16000700908',
            'user_id' => '1',
            'item_name' => 'butter',
            'measurement' => 'tablespoons',
            'serving_size' => '1',
            'servings_per_container' => '8',
            'type' => '1',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000690908',
            'user_id' => '1',
            'item_name' => 'eggs',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '12',
            'type' => '1',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000680908',
            'user_id' => '1',
            'item_name' => 'milk',
            'measurement' => 'cups',
            'serving_size' => '1',
            'servings_per_container' => '16',
            'type' => '0',
            'storage' => '1',
            'expiration' => '7',
            'ready_to_eat' => '1',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000670908',
            'user_id' => '1',
            'item_name' => 'Sharp Cheddar Shredded Cheese',
            'measurement' => 'ounces',
            'serving_size' => '1',
            'servings_per_container' => '16',
            'type' => '1',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000650908',
            'user_id' => '1',
            'item_name' => 'Apple',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '1',
            'type' => '1',
            'storage' => '1',
            'expiration' => '21',
            'ready_to_eat' => '1',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000640908',
            'user_id' => '1',
            'item_name' => 'Banana',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '1',
            'type' => '1',
            'storage' => '2',
            'expiration' => '5',
            'ready_to_eat' => '1',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000630908',
            'user_id' => '1',
            'item_name' => 'Burger Buns',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '8',
            'type' => '1',
            'storage' => '2',
            'expiration' => '6',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000620908',
            'user_id' => '1',
            'item_name' => 'Sliced Peperjack Cheese',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '16',
            'type' => '1',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000610908',
            'user_id' => '1',
            'item_name' => 'Ground Beef',
            'measurement' => 'pounds',
            'serving_size' => '.25',
            'servings_per_container' => '16',
            'type' => '1',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000600908',
            'user_id' => '1',
            'item_name' => 'Cheetos',
            'measurement' => 'ounces',
            'serving_size' => '.25',
            'servings_per_container' => '16',
            'type' => '1',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '1',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000590908',
            'user_id' => '1',
            'item_name' => 'Onion',
            'measurement' => 'quantity',
            'serving_size' => '.2',
            'servings_per_container' => '5',
            'type' => '1',
            'storage' => '2',
            'expiration' => '35',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000580908',
            'user_id' => '1',
            'item_name' => 'Tomato',
            'measurement' => 'quantity',
            'serving_size' => '.2',
            'servings_per_container' => '5',
            'type' => '1',
            'storage' => '1',
            'expiration' => '14',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000570908',
            'user_id' => '1',
            'item_name' => 'Spaghetti Noodles',
            'measurement' => 'ounces',
            'serving_size' => '2',
            'servings_per_container' => '8',
            'type' => '1',
            'storage' => '2',
            'expiration' => '365',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000560908',
            'user_id' => '1',
            'item_name' => 'Prego Italian Sauce',
            'measurement' => 'cups',
            'serving_size' => '.5',
            'servings_per_container' => '5',
            'type' => '0',
            'storage' => '2',
            'expiration' => '365',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000540908',
            'user_id' => '1',
            'item_name' => 'Sliced Turkey',
            'measurement' => 'pounds',
            'serving_size' => '.2',
            'servings_per_container' => '5',
            'type' => '1',
            'storage' => '1',
            'expiration' => '7',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000530908',
            'user_id' => '1',
            'item_name' => 'Sliced Bread',
            'measurement' => 'quantity',
            'serving_size' => '2',
            'servings_per_container' => '12',
            'type' => '1',
            'storage' => '2',
            'expiration' => '7',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000520908',
            'user_id' => '1',
            'item_name' => 'Mild Salsa',
            'measurement' => 'cups',
            'serving_size' => '.25',
            'servings_per_container' => '12',
            'type' => '0',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000510908',
            'user_id' => '1',
            'item_name' => 'Taco Shells',
            'measurement' => 'quantity',
            'serving_size' => '2',
            'servings_per_container' => '6',
            'type' => '1',
            'storage' => '2',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000990908',
            'user_id' => '1',
            'item_name' => 'Head of Lettuce',
            'measurement' => 'quantity',
            'serving_size' => '.2',
            'servings_per_container' => '5',
            'type' => '1',
            'storage' => '1',
            'expiration' => '10',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '16000660908',
            'user_id' => '1',
            'item_name' => 'Cinnamon Toast Crunch Cereal Bars',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '6',
            'type' => '1',
            'storage' => '2',
            'expiration' => '90',
            'ready_to_eat' => '1',
        ]);
        //will show as about to expire. Use example for demo that you put the bread in the freezer
        //so its not actually about to expire.
        DB::table('items')->insert([
            'barcode' => '16000880908',
            'user_id' => '1',
            'item_name' => 'Sliced Bread',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '6',
            'type' => '1',
            'storage' => '2',
            'expiration' => '2',
            'ready_to_eat' => '1',
        ]);
        //this one has a negative expiration so that it will show expired
        DB::table('items')->insert([
            'barcode' => '16000770908',
            'user_id' => '1',
            'item_name' => 'Birthday Cake',
            'measurement' => 'quantity',
            'serving_size' => '1',
            'servings_per_container' => '6',
            'type' => '1',
            'storage' => '2',
            'expiration' => '-3',
            'ready_to_eat' => '1',
        ]);
        

    }
}