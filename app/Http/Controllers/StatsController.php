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
            $consumptionPerMonth = array(
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
                    $wastePerMonth[0] += $temp;
                }
                else if($fw->updated_at->between($past2, $past1)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[1] += $temp;
                }
                else if($fw->updated_at->between($past3, $past2)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[2] += $temp;
                }
                else if($fw->updated_at->between($past4, $past3)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[3] += $temp;
                }
                else if($fw->updated_at->between($past5, $past4)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[4] += $temp;
                }
                else if($fw->updated_at->between($past6, $past5)){
                    $temp = 0;
                    $temp = $fw->expired;
                    $wastePerMonth[5] += $temp;
                }
            }

            //Getting consumption from db
            $foodConsumption = inventory::where('user_id', $user_id)->where('used', '!=', 0)->orderBy('item_id', 'asc')->get();
            foreach($foodWaste as $ii){
                $ii->item;
            }
            
            //finding what month each thing is for
            foreach($foodConsumption as $fc){
                if($fc->updated_at->between($past1, $today)){
                    $temp = 0;
                    $temp = $fc->used;
                    $consumptionPerMonth[0] += $temp;
                }
                else if($fc->updated_at->between($past2, $past1)){
                    $temp = 0;
                    $temp = $fc->used;
                    $consumptionPerMonth[1] += $temp;
                }
                else if($fc->updated_at->between($past3, $past2)){
                    $temp = 0;
                    $temp = $fc->used;
                    $consumptionPerMonth[2] += $temp;
                }
                else if($fc->updated_at->between($past4, $past3)){
                    $temp = 0;
                    $temp = $fc->used;
                    $consumptionPerMonth[3] += $temp;
                }
                else if($fc->updated_at->between($past5, $past4)){
                    $temp = 0;
                    $temp = $fc->used;
                    $consumptionPerMonth[4] += $temp;
                }
                else if($fc->updated_at->between($past6, $past5)){
                    $temp = 0;
                    $temp = $fc->used;
                    $consumptionPerMonth[5] += $temp;
                }
            }
            //getting totals

            $total0 = $consumptionPerMonth[0] + $wastePerMonth[0];
            $total1 = $consumptionPerMonth[1] + $wastePerMonth[1];
            $total2 = $consumptionPerMonth[2] + $wastePerMonth[2];
            $total3 = $consumptionPerMonth[3] + $wastePerMonth[3];
            $total4 = $consumptionPerMonth[4] + $wastePerMonth[4];
            $total5 = $consumptionPerMonth[5] + $wastePerMonth[5];
            
            //making arrays for return

            $month0 = array($total0,$wastePerMonth[0], $consumptionPerMonth[0]);
            $month1 = array($total1,$wastePerMonth[1], $consumptionPerMonth[1]);
            $month2 = array($total2,$wastePerMonth[2], $consumptionPerMonth[2]);
            $month3 = array($total3,$wastePerMonth[3], $consumptionPerMonth[3]);
            $month4 = array($total4,$wastePerMonth[4], $consumptionPerMonth[4]);
            $month5 = array($total5,$wastePerMonth[5], $consumptionPerMonth[5]);

            $resultArray = array
                (
                    "Total Waste" => $totalWaste,
                    "month 0" => $month0,
                    "month 1" => $month1,
                    "month 2" => $month2,
                    "month 3" => $month3,
                    "month 4" => $month4,
                    "month 5" => $month5
                );
            


            //return response()->json($past5);
            return response()->json($resultArray);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }
}
