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
    }
}