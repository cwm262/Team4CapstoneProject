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
            'id' => '1',
            'quantity' => '3',
        ]);
    }
}
