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
            'id' => '1',
            'rating' => '10',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '2',
            'id' => '1',
            'rating' => '7',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '3',
            'id' => '1',
            'rating' => '8',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '4',
            'id' => '1',
            'rating' => '5',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '5',
            'id' => '1',
            'rating' => '9',
        ]);
        DB::table('recipe_ratings')->insert([
            'recipe_id' => '6',
            'id' => '1',
            'rating' => '10',
        ]);
    }
}
