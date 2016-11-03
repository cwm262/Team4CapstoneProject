<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use pantryApp\Http\Requests;
use pantryApp\Http\Controllers\Controller;
use pantryApp\Item;
use pantryApp\inventory;

class NotificationController extends Controller
{
    public function urgent($user_id){
       /*
        //Do database lookups
        //Find all inventory items where expiration is < x number of days
        //return json
		try{
			//find all of users inventory items
			$userItems = inventory::where('user_id', $user_id)->where('quantity', '>', 0)->where('quantity', '>', 'used')->orderBy(item_id, 'asc')->get();
			
			//for each inventory item
			//find its expiration time and see how many days it has left
			//if greater than 2 days, remove from the userItems array
			foreach($userItems as $ui){
				$item = array_get($ui, 'item_id');
				$creation = array_get($ui, 'created_at');
				$expiration_date = DB::table('items')->select->('expiration')where('item_id', $item_id )->get();
				$today = Carbon::today();
				if ($created->addDays(expiration_date)->diffInDays($today) > 2) {
					array_forget($userItems, 'item_id', $item);
				}
			}
			//return array as json
			return response()->json($userItems);
			
		}
        */
        try{
            $expireSoon = inventory::where('user_id', $user_id)->where('quantity', '>', 0)->orderBy('item_id', 'asc')->get();
                
                foreach($expireSoon as $ii){
                    $ii->item;
                }

                $creationDay = 0;
                $days = 0;
                $expireDate = 0;
                $dangerDate = 0;
                $newDangerDate = 0;
                $newExpireDate = 0;

                $today = Carbon::today();
                $threeDaysAgo = Carbon::today();
                $threeDaysAgo->subDay(3);

                $dangerZone = array();
                $ignoreDangerZone = array();
    
                foreach($expireSoon as $ex){
                    $today = Carbon::today();
                    $creationDay = $ex->created_at;
                    $days = $ex->expiration;

                    $expireDate = $creationDay;
                    $expireDate->addDay($days);
                    $dangerDate = $creationDay;
                    $dangerDate->addDay($days);
                    $dangerDate->subDay(3);
                    //$dangerZone[] = $expireDate;
                    
                    if($ex->ignored_at != NULL){
                        $ignoreDate = $ex->ignored_at;
                        $newDangerDate = $ignoreDate;
                                //$dangerZone[] = $newDangerDate;
                        $newDangerDate->addDay(7);
                        $newExpireDate = $newDangerDate;
                        $newExpireDate->addDay(30);
                        if($today->between($newDangerDate, $newExpireDate)){
                            //$ignoreDangerZone[] = $ex->item_name;****
                            $dangerZone[] = $ex->item->item_name;
                        }
                    }
                    if($today->between($dangerDate, $expireDate) && $ex->ignored_at == NULL){
                        //array_push($dangerZone, $ex->item_name);*****
                        
                        $dangerZone[] = $ex->item->item_name;
                    }
                    
                }
        //$temptest = 100;
        //return response()->json($expireSoon);
        return response()->json($dangerZone);
        //return response()->json($temptest);
        
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    
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
                        if($inventoryItem->item_id == $recipeItem){
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
