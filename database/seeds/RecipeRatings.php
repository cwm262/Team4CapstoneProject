<?php

use Illuminate\Database\Seeder;

class RecipeRatings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_ratings')->delete();
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '1',
            'user_id' => '1',
            'rating' => '10',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '2',
            'user_id' => '1',
            'rating' => '7',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '3',
            'user_id' => '1',
            'rating' => '8',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '4',
            'user_id' => '1',
            'rating' => '5',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '5',
            'user_id' => '1',
            'rating' => '9',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '6',
            'user_id' => '1',
            'rating' => '10',
        ]);
    }
}
