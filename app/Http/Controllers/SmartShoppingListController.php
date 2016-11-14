<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\inventory;
use pantryApp\Item;

class SmartShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id, $date_range = 180, $num_days = 14)
    {
        try{
            $items = $this->getSuggestedItems($user_id, $date_range, $num_days);
            $itemArray = array();
            foreach ($items as $key => $value){
                $myItem = Item::where('item_id', $key)->select('item_name', 'measurement')->first();
                $myItem['quantity'] = $value;
                array_push($itemArray, $myItem);
            }

            return response()->json($itemArray);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    private function getSuggestedItems($user_id, $date_range, $num_days) 
    {
        // Get all items the user has added in the last $date_range days
        $date_bound = date('Y-m-d', strtotime("-$date_range days"));
        $used_items = inventory::where('user_id', $user_id)->where('created_at', '>=', $date_bound)->orderBy('item_id', 'asc')->get();

        foreach($used_items as $used_item) {
            $item_lists[$used_item["item_id"]] = array(); 
        }
        foreach($used_items as $used_item) {
            array_push($item_lists[$used_item["item_id"]], $used_item);
        }

        // will be an array of item_id => number_of_items
        $num_items = array();

        foreach($item_lists as $item_id => $item_list) {
            //$count[$item_id] = sizeof($item_list);

            // Get earliest occurance of the item in the time frame
            // Also, Determine the quantity in that time span 
            $earliest_date = date('Y-m-d');
            $quantity = 0;

            foreach($item_list as $item) {
                // date
                $earliest_date = min($earliest_date, date("Y-m-d", strtotime($item["created_at"])));

                // quantity
                $quantity += $item["used"];
            }

            // Determine the time span for each items purchase rate
            $now = time();
            //$first = strtotime($dates[$item_id]);
            $first = strtotime($earliest_date);
            $diff = $now - $first;
            $time_span = max(7, floor($diff / (60 * 60 * 24))); // rounds everything up to one week (after this item has existed more than a week this will be the new time_span)

            // consumption rate (quantity per day)
            $consumptionRate = $quantity / $time_span;

            // total quantity (number of servings) for the time period
            $desired_quantity = $consumptionRate * $num_days;

            // get number of servings for the specified item
            $item_serving_size = Item::where('item_id', $item_id)->orderBy('item_id', 'asc')->pluck('serving_size')->first();
            
            // Just incase there is a 0 serving size (shouldn't be possible but who am I to judge?)
            if($item_serving_size == 0) {
                $item_serving_size = 0.01;
            }

            // determine the number of items to get
            $n = floor($desired_quantity / $item_serving_size);
            
            // If the number of items is greater than one unit then add to list, else do nothing
            if($n > 0) { 
                $num_items[$item_id] = $n;
            }
        }

        return $num_items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
