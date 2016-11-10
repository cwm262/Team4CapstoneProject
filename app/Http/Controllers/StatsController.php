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

            $wastePerMonth = array(
                "0" => 0,
                "1" => 0,
                "2" => 0,
                "3" => 0,
                "4" => 0,
                "5" => 0,
            );
            foreach($foodWaste as $fw){
                if($fw->updated_at->between($past1, $today)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[0] = $temp;
                }
                else if($fw->updated_at->between($past2, $past1)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[1] = $temp;
                }
                else if($fw->updated_at->between($past3, $past2)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[2] = $temp;
                }
                else if($fw->updated_at->between($past4, $past3)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[3] = $temp;
                }
                else if($fw->updated_at->between($past5, $past4)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[4] = $temp;
                }
                else if($fw->updated_at->between($past6, $past5)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[5] = $temp;
                }
            }

            //making array for return
            $resultArray = array
                (
                    "Total Waste" => $totalWaste,
                    "Waste Per Month" => $wastePerMonth
                );
            


            //return response()->json($past5);
            return response()->json($resultArray);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }
}
