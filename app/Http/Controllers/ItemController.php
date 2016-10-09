<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        return response()->json(inventory::where('user_id', $user_id)->orderBy('item_id', 'asc')->get());   
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
            $item = new Item;

            $item->item_id = $request->('item_id');
            $item->barcode = $request->('barcode');
            $item->user_id = $request->('user_id');
            $item->item_name = $request->('item_name');
            $item->measurement = $request->('measurement');
            $item->serving_sive = $request->('serving_size');
            $item->servings_per_container = $request->('servings_per_container');
            $item->type = $request->('type');
            $item->storage = $request->('storage');
            $item->expiration = $request->('expiration');
            $item->ready_to_eat = $request->('ready_to_eat');
            $item->created_at = $request->('created_at');
            $item->updated_at = $request->('updated_at');

            $item->save();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        try{
        return response()->json(item::where('item_id' $item_id)->get());
        }
        catch(\Exception $e){
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
     
    public function update(Request $request, $item_id)
    {   
        try{
            $itemUpdate = item::where('item_id', $item_id)->orderBy('created_at', 'asc')->first();
            $input = $request->all();
                foreach ($input as $key => $value) {
                    $itemUpdate->$key = $value;
                }
            $itemUpdate->save();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
    */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function destroy($id)
    {
        try{
            $item = Item::find($id);
            $item->delete();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
    */
}
