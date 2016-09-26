<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;

use pantryApp\Http\Requests;

class GroceriesInInventoryListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                return response()->json(Item::get());
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
        try{
            $groceriesInInventory = new GroceriesInInventoryList;
            $groceriesInInventory->item_id = $request->input('item_id');
            $groceriesInInventory->user_id = $request->input('user_id');
            $groceriesInInventory->list_id = $request->input('list_id');
            $groceriesInInventory->quantity = $request->input('quantity');
            $groceriesInInventory->
            $groceriesInInventory->save();
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
        try{
            $groceriesInInventory = Item::find($id);
            $groceriesInInventory->delete();
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
}
