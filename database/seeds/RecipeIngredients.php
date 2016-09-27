<?php

use Illuminate\Database\Seeder;

class RecipeIngredients extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_ingredients')->delete();
        DB::table('recipe_ingredients')->insert([
            'item_id' => '1',
            'recipe_id' => '2',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '2',
            'recipe_id' => '2',
            'quantity'=> '2',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '1',
            'recipe_id' => '2',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '3',
            'recipe_id' => '2',
            'quantity'=> '.1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '4',
            'recipe_id' => '2',
            'quantity'=> '4',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '13',
            'recipe_id' => '1',
            'quantity'=> '8',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '14',
            'recipe_id' => '1',
            'quantity'=> '5',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '7',
            'recipe_id' => '3',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '8',
            'recipe_id' => '3',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '9',
            'recipe_id' => '3',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '11',
            'recipe_id' => '3',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '12',
            'recipe_id' => '3',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '15',
            'recipe_id' => '4',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '8',
            'recipe_id' => '4',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '15',
            'recipe_id' => '4',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '16',
            'recipe_id' => '4',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '1',
            'recipe_id' => '5',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '16',
            'recipe_id' => '5',
            'quantity'=> '1',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '8',
            'recipe_id' => '5',
            'quantity'=> '2',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '9',
            'recipe_id' => '6',
            'quantity'=> '4',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '17',
            'recipe_id' => '6',
            'quantity'=> '4',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '18',
            'recipe_id' => '6',
            'quantity'=> '5',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '19',
            'recipe_id' => '6',
            'quantity'=> '2.5',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '12',
            'recipe_id' => '6',
            'quantity'=> '5',
        ]);
        DB::table('recipe_ingredients')->insert([
            'item_id' => '4',
            'recipe_id' => '6',
            'quantity'=> '8',
        ]);
    }
}
