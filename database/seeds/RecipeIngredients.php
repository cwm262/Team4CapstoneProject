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
    }
}
