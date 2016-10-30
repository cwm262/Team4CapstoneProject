<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\recipe;
use pantryApp\recipe_ingredient;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $user_id
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        try{
            $recipes = recipe::where('user_id', $user_id)->orderBy('name', 'asc')->get();

            foreach($recipes as $recipe) {
                $rating = $recipe->rating;
                $ingredients = $recipe->ingredients;
                
                foreach($ingredients as $ingredient) {
                    $ingredient->item;
                }
            }

            return response()->json($recipes);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }


    public function store(Request $request)
    {
        try{
            $recipe = new recipe;
            $recipe->user_id = $request->input('user_id');
            $recipe->name = $request->input('name');
            $recipe->instructions = $request->input('instructions');
            $recipe->prep_time = $request->input('prep_time');
            $recipe->save();

            // Add each item to the recipe_ingredients table
            // - Each item in $request->ingredients should have an item_id and quantity
            // - Item must already exist in items table
            foreach($request->ingredients as $ingredient) {
                $this->setIngredient($ingredient, $recipe->id);
            }

            return response()->json($recipe);
            //return response()->json($temp);

        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    public function setIngredient($ingredient, $recipe_id)
    {
        // 1 request will have 1 row in the ingredients table
        // item_id/recipe_id
        // Quantity

        try{
            $recipe_ingredient = new recipe_ingredient;
            $recipe_ingredient->item_id = $ingredient['item_id'];
            $recipe_ingredient->recipe_id = $recipe_id;
            $recipe_ingredient->quantity = $ingredient['quantity'];

            $recipe_ingredient->save();

            return $recipe_ingredient;

        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        try{
            $recipes = recipe::where('user_id', $user_id)->orderBy('name', 'asc')->get();
            return response()->json($recipes);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }


    /**
     * Update the specified resource in storage.
     * 
     * Warning! This will change the recipe_id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        try{
            $status = $this->destroy($request->recipe_id);

            if($status == "Deleted") {
                $status = $this->store($request);
            }

            return $status;

        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recipe_id)
    {
        try{
            if(recipe::where('recipe_id', $recipe_id)->exists()) {
                recipe::where('recipe_id', $recipe_id)->delete();
                return "Deleted";
            }
            return "Not Found";
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
}
