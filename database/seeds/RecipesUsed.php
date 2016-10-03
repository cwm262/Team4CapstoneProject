<?php

use Illuminate\Database\Seeder;

class RecipesUsed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes_used')->delete();
        DB::table('recipes_used')->insert([
            'recipe_id' => '1',
            'user_id' => '1',
            'quantity' => '1',
        ]);
        DB::table('recipes_used')->insert([
            'recipe_id' => '2',
            'user_id' => '1',
            'quantity' => '4',
        ]);
        DB::table('recipes_used')->insert([
            'recipe_id' => '3',
            'user_id' => '1',
            'quantity' => '8',
        ]);
        DB::table('recipes_used')->insert([
            'recipe_id' => '4',
            'user_id' => '1',
            'quantity' => '2',
        ]);
        DB::table('recipes_used')->insert([
            'recipe_id' => '5',
            'user_id' => '1',
            'quantity' => '3',
        ]);
        DB::table('recipes_used')->insert([
            'recipe_id' => '6',
            'user_id' => '1',
            'quantity' => '2',
        ]);
    }
}
