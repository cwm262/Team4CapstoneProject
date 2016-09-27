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
            'barcode' => '123',
            'id' => '1',
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
            'barcode' => '124',
            'id' => '1',
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
            'barcode' => '125',
            'id' => '1',
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
            'barcode' => '126',
            'id' => '1',
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
            'barcode' => '127',
            'id' => '1',
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
            'barcode' => '128',
            'id' => '1',
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
            'barcode' => '129',
            'id' => '1',
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
            'barcode' => '130',
            'id' => '1',
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
            'barcode' => '131',
            'id' => '1',
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
            'barcode' => '132',
            'id' => '1',
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
            'barcode' => '133',
            'id' => '1',
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
            'barcode' => '134',
            'id' => '1',
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
            'barcode' => '135',
            'id' => '1',
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
            'barcode' => '136',
            'id' => '1',
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
            'barcode' => '137',
            'id' => '1',
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
            'barcode' => '138',
            'id' => '1',
            'item_name' => 'Sliced Bread',
            'measurement' => 'grams',
            'serving_size' => '38',
            'servings_per_container' => '18',
            'type' => '1',
            'storage' => '2',
            'expiration' => '7',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '139',
            'id' => '1',
            'item_name' => 'Mild Salsa',
            'measurement' => 'tablespoons',
            'serving_size' => '2',
            'servings_per_container' => '24',
            'type' => '0',
            'storage' => '1',
            'expiration' => '30',
            'ready_to_eat' => '0',
        ]);
        DB::table('items')->insert([
            'barcode' => '140',
            'id' => '1',
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
            'barcode' => '141',
            'id' => '1',
            'item_name' => 'Head of Lettuce',
            'measurement' => 'quantity',
            'serving_size' => '.2',
            'servings_per_container' => '5',
            'type' => '1',
            'storage' => '1',
            'expiration' => '10',
            'ready_to_eat' => '0',
        ]);
    }
}