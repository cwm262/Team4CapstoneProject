<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $user_id
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        try{
            $inventoryItems = inventory::where('user_id', $user_id)->where('quantity', '>', 0)->orderBy('item_id', 'asc')->get();
            //Calling the item() function inside the inventory model to grab the associated item specs for
            //each row in a user's inventory table
            foreach($inventoryItems as $ii){
                $ii->item;
            }
            return response()->json($inventoryItems);
        }catch(\Exception $e){
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
        try{
            $inventoryItem = new inventory;
            $inventoryItem->item_id = $request->input('item_id');
            $inventoryItem->user_id = $request->input('user_id');
            $inventoryItem->quantity = $request->input('quantity');
            $inventoryItem->total = $request->input('total');
            $inventoryItem->save();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $user_id
     * @param int $item_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, $item_id)
    {
        try{
            $inventoryItems = inventory::where('user_id', $user_id)->where('item_id', $item_id)->where('quantity', '>', 0)->get();
            foreach($inventoryItems as $ii){
                $ii->item;
            }
            return response()->json($inventoryItems);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
        
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
        try{
            $inventoryItem = inventory::find($id);
            $input = $request->all();
            foreach ($input as $key => $value) {
                $inventoryItem->$key = $value;
                //Needs to not allow lowering below 0
            }
            $inventoryItem->save();
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
    public function destroy($id)
    {
        //Consider making this private and called from update
    }
}