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
            return response()->json($recipes);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*try{
            $recipe = new recipe;
            $recipe->item_id = $request->input('item_id');
            $recipe->user_id = $request->input('user_id');
            $recipe->name = $request->input('name');
            $recipe->instructions = $request->input('instructions');
            $recipe->prep_time = $request->input('prep_time');
            $recipe->save();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }*/
    }

    public function setIngredient(Request $request)
    {
        // 1 request will have 1 row in the ingredients table
        // item_id/recipe_id
        // Verify them
        // Quantity
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*try{
            $recipes = recipe::where('user_id', $user_id)->orderBy('name', 'asc')->get();
            return response()->json($recipes);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }*/
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*try{
            $recipe = recipe::find($id);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $recipe->$key = $value;
            }
            $recipe->save();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*try{
            $recipe = recipe::find($id);
            $recipe->delete();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }*/
    }
}
