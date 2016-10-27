<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\inventory;

class StatsController extends Controller
{
    public function index($user_id)
    {
        try{
            $foodWaste = inventory::where('user_id', $user_id)->where('expired', '!=', 0)->orderBy('item_id', 'asc')->get();
            //Calling the item() function inside the inventory model to grab the associated item specs for
            //each row in a user's inventory table
            foreach($foodWaste as $ii){
                $ii->item;
            }
            $totalWaste = 0;
            foreach($foodWaste as $gg){
                $numExpired = $gg->expired;
                $totalWaste += $numExpired;
            }

            //return response()->json($foodWaste);
            return response()->json($totalWaste);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }
}
