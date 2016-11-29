<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\inventory;
use pantryApp\Item;
use pantryApp\shopping_list;

class ShoppingListController extends Controller
{

    private function store($user_id, $item_id, $quantity){
        try{
            $shoppingList = new shopping_list;
            $shoppingList->user_id = $user_id;
            $shoppingList->item_id = $item_id;
            $shoppingList->quantity = $quantity;
            $shoppingList->save();
            return response()->json($shoppingList);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
    public function getList($user_id){
        try{
            $shoppingList = shopping_list::where('user_id', $user_id)->get();

            foreach($shoppingList as $sl){
                $sl->item;
            }
            return response()->json($shoppingList);
        }
        catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array());
        }
    }

    public function updateList(Request $request){

        try{
            $status = $this->deleteList($request->input('user_id'));
            $items = $request->input('items');
            $items = json_decode($items);
            foreach($items as $item){
                $this->store($request->input('user_id'), $item->item_id, $item->quantity);
            }
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }

    public function deleteList($user_id){
        try{
            if(shopping_list::where('user_id', $user_id)->exists()) {
                shopping_list::where('user_id', $user_id)->delete();
                return "Deleted";
            }
            return "Not Found";
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Please contact support with time that error occurred."), 500);
        }
    }
}
