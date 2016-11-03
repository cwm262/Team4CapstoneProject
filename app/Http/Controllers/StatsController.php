<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

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
            //creating all the dates needed for the logic
            $today = Carbon::today();

            $past1 = Carbon::today();
            $past1->subMonth();

            $past2 = Carbon::today();
            $past2->subMonth(2);
            
            $past3 = Carbon::today();
            $past3->subMonth(3);

            $past4 = Carbon::today();
            $past4->subMonth(4);

            $past5 = Carbon::today();
            $past5->subMonth(5);

            $past6 = Carbon::today();
            $past6->subMonth(6);

            //adding up the total wasted for x months back
            $waste1 = 0;
            foreach($foodWaste as $w1){
                if($w1->updated_at->between($past1, $today)){
                    $temp = $w1->expired;
                    $waste1 = $temp;
                }
            }

            $waste2 = 0;
            foreach($foodWaste as $w2){
                if($w2->updated_at->between($past2, $past1)){
                    $temp = $w2->expired;
                    $waste2 = $temp;
                }
            }

            $waste3 = 0;
            foreach($foodWaste as $w3){
                if($w3->updated_at->between($past3, $past2)){
                    $temp = $w3->expired;
                    $waste3 = $temp;
                }
            }

            $waste4 = 0;
            foreach($foodWaste as $w4){
                if($w4->updated_at->between($past4, $past3)){
                    $temp = $w4->expired;
                    $waste4 = $temp;
                }
            }

            $waste5 = 0;
            foreach($foodWaste as $w5){
                if($w5->updated_at->between($past5, $past4)){
                    $temp = $w5->expired;
                    $waste5 = $temp;
                }
            }

            $waste6 = 0;
            foreach($foodWaste as $w6){
                if($w6->updated_at->between($past6, $past5)){
                    $temp = $w6->expired;
                    $waste6 = $temp;
                }
            }

            //making array for return
            $resultArray = array
                (
                array("total wasted",$totalWaste),
                array("waste by month",$waste1, $waste2, $waste3, $waste4, $waste5, $waste6)
                );
            


            //return response()->json($past5);
            return response()->json($resultArray);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }
}
