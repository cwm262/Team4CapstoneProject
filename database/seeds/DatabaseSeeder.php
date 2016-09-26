<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('ItemsTableSeeder');
        $this->call('InventorySeeder');
        $this->call('RecipeTable');
        $this->call('RecipeIngredients');
        $this->call('RecipesUsed');
    }
}
