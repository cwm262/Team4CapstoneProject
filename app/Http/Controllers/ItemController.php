<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\Item;

class ItemController extends Controller
{
    /** index: GET request to /api/items/$user_id 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        try{
            $items = Item::where('user_id', $user_id)->orderBy('item_id', 'asc')->get();
            return response()->json($items);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }

    /** store: POST request to /api/items
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            $item = new Item;
            $item->user_id = $request->input('user_id');
            $item->barcode = $request->input('barcode');
            $item->item_name = $request->input('item_name');
            $item->measurement = $request->input('measurement');
            $item->serving_size = $request->input('serving_size');
            $item->servings_per_container = $request->input('servings_per_container');
            $item->type = $request->input('type');
            $item->storage = $request->input('storage');
            $item->expiration = $request->input('expiration');
            $item->ready_to_eat = $request->input('ready_to_eat');
            $item->save();
            return response()->json($item);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $barcode
     * @return \Illuminate\Http\Response
     */
    public function show($barcode)
    {
        try{
            $return = Item::where('barcode', $barcode)->get();
            if(count($return) == 0){
                return response()->json(array('message' => "Item not found"), 404);
            }
            else{
                return response()->json($return);
            }
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
        try{
            $deletedRows = Item::where('item_id', $id)->delete();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
}
