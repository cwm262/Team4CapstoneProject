<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Response;

use pantryApp\Http\Requests;
use pantryApp\Http\Controllers\Controller;
use pantryApp\Item;
use pantryApp\inventory;
use pantryApp\recipe;
use pantryApp\recipie_ingredients;

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
				//$expiration_date = DB::table('items')->select->('expiration')where('item_id', $item_id )->get();
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
 
                    $dateRange = array();

                    $creationDay = $ex->created_at;
                    $days = (int)$ex->item->expiration;
                    $dangerDate = clone $creationDay;
                    //return $dangerDate;
                    $dangerDate->addDays($days);
                    //return $dangerDate;
                    $dangerDate->subdays(3);
                    
                    $expireDate = clone $creationDay;
                    $expireDate->addDays($days);
                    array_push($dateRange, $dangerDate);
                    array_push($dateRange, $expireDate);



// this is commented out because when they ignore a notification it will now never show again.
                    if($ex->ignored_at != NULL){
                        $newDangerDate = $ex->created_at;
                        //return $newDangerDate;
                        Carbon::parse($newDangerDate);
                        //return $newDangerDate;
                        $newDangerDate->addDays(7);
                        //return $newDangerDate;
                        $newExpireDate = $ex->created_at;
                        $newExpireDate->addDays(14);
                        if($today->between($newDangerDate, $newExpireDate)){

                            array_push($dangerZone, $ex);
                        }
                    }
                    if($today->between($dangerDate, $expireDate) && $ex->ignored_at == NULL){
                        array_push($dangerZone, $ex);
                    }
                    
                }
        //$temptest = 100;
        return response()->json($dangerZone);
        //return response()->json($dangerZone);
        //return response()->json($temptest);
        
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    
    }
    //needs the id of the inventory row not user_id
    public function ignore($id){
        try{
            $inventoryItem = inventory::find($id);
            $today = Carbon::today();
            $inventoryItem->ignored_at = $today;
            $inventoryItem->save();
            $test = inventory::find($id);
            
            return response()->json($test);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    public function expired($user_id){
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
                $futureMonth = Carbon::today();
                $futureMonth->addDay(30);

                $dangerZone = array();
                
                
                foreach($expireSoon as $ex){

                    $creationDay = $ex->created_at;
                    $days = (int)$ex->item->expiration;
                    
                    $expireDate = clone $creationDay;
                    $expireDate->addDays($days);
                    $forgetDate = clone $expireDate;
                    $forgetDate->addDays(30);

                    if($today->between($expireDate, $forgetDate) && $ex->ignored_at == NULL){
                        array_push($dangerZone, $ex);
                    }
                    
                }
            //$test = "100";
            return response()->json($dangerZone);

        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

	
  public function recipes($user_id){


        try{
            //get all the recipes the user has made
            $recipes = recipe::where('user_id', $user_id)->orderBy('name', 'asc')->get();
            $inventoryItems = inventory::where('user_id', $user_id)->where('quantity', '>', 0)->orderBy('item_id', 'asc')->get();
            $haveIngredients = [];
            $insertionCount = 0;
            //loop through all the recipes to compare with what you have
            foreach($recipes as $recipe) {
                $count = 0;
                $ingredients = $recipe->ingredients;
                //count the number of ingredients to make the recipe for reference later
                $ingredientCount = count($ingredients);          
                //go through each of the ingredients that is required to make the recipe
                foreach($ingredients as $ingredient) {
                    $recipeItem = $ingredient->item_id;
                    $recipeQuantity = $ingredient->quantity;
                    //go through each item the user has and compare it to the item 
                    //required to make the recipe 
                    $id = null;
                    $realCount = 0;
                  //  return $inventoryItems[4];
                    for ($i = 0; $i < count($inventoryItems)-1; $i++){
                        if ($id == $inventoryItems[$i]->item_id){
                            $realCount += $inventoryItems[$i]->quantity;
                        }
                        else{
                            $realCount = $inventoryItems[$i]->quantity;
                        }
                        $id = $inventoryItems[$i]->item_id;
                        
                        //bump the counter if you have the ingredient item that is required to make the recipe
                        //also makes sure you have enough of the item in order to make the recipe
                        if($inventoryItems[$i]->item_id == $recipeItem && $realCount >= $recipeQuantity && $inventoryItems[$i+1]->item_id != $inventoryItems[$i]->item_id){
                            $count++;        
                        }                      
                    }                  
                }

                //if you have the same number of ingredients to make the recipe that the recipe calls for 
                //then you have all the ingredients for that recipe and add it to be returned
                if ($ingredientCount == $count){
                    
                        $recipeSort [] = ['recipe_id' => $recipe->recipe_id, 'rating' => $recipe->rating->rating];
                    }
            }
            //return all of the recipe ID's to the front end
            foreach ($recipeSort as $key => $row) {
               $ratingSort[$key] = $recipeSort[$key]['rating'];
            }
            //Sort array based on rating and then if equal base rating off times made
            array_multisort($ratingSort, SORT_DESC, $recipeSort);
            
            foreach ($recipeSort as $ii){
                $haveIngredients[$insertionCount] = $ii['recipe_id'];
                $insertionCount++;
            }
            return response()->json($haveIngredients);      
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());

            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }
    
}
?>