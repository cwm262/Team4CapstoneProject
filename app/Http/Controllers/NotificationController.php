<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;

use pantryApp\Http\Requests;
use pantryApp\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function urgent($user_id){
        //Do database lookups
        //Find all inventory items where expiration is < x number of days
        //return json
    }

    public function recipes($user_id){

        try{
           $recipes = recipes::where('user_id', $user_id)->orderBy('name', 'asc')->get();
           $invetoryItems = inventory::where('user_id', $user_id)->orderBy('name', 'asc')->get();

            foreach($recipes as $recipe) {
                $key = $recipe->recipie_id;
                $ingredients = recipe_ingredients::where('recipe_id', $key)->get();
                $ingredientCount = count($ingredients);

                foreach($ingredients as $ingredient) {
                    $recipeItem = $ingredient->item_id;

                    foreach ($inventoryItems as $inventoryItem){
                        if($inventoryItem->item_id = $recipeItem){
                            $count++;
                        }
                    }
                }
                if ($ingredientCount = $count){
                        $haveIngredients += $recipe;
                    }
            }

            return response()->json($haveIngredients);            
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
        //Create an algorithm/query to build a list of recipe suggestions
        //Return json
    }
}
