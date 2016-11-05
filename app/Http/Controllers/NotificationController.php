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

           $recipes = recipes::where('user_id', $user_id)->orderBy('name', 'asc')->get();

           return response()->json($recipes); 
    /*         $invetoryItems = inventory::where('user_id', $user_id)->orderBy('name', 'asc')->get();

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
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);*/
    //    } 
       
    }

}
