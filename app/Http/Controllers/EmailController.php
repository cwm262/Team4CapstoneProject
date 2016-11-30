<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use pantryApp\Http\Requests;
use pantryApp\User;
use pantryApp\shopping_list;
use pantryApp\Item;

use pantryApp\Http\Controllers\SmartShoppingListController;

use Mail;

class EmailController extends Controller
{   
    public function send(Request $request){
        try{
            date_default_timezone_set('America/Chicago');
            $shoppingList = shopping_list::where('user_id', $request->user_id)->get();

            foreach($shoppingList as $sl){
                $sl->item;
            }

            $todaysDate = date('l \t\h\e jS');
            $greeting = "Your shopping list";
            $title = "Your Shopping List For " . $todaysDate;

            Mail::send('emails.send', ['title' => $title, 'shoppingList' => $shoppingList], 
                function ($m) use ($greeting)
                {
                    $m->from('TheWizard@PantryWizard.app', 'Pantry Wizard Shopping List');
                    $m->to('azathoth.hp@gmail.com')->subject($greeting);
                });
            return response()->json($shoppingList);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
   
    }

    public function smartSend(Request $request){
        try{
            date_default_timezone_set('America/Chicago');
            $shoppingList = shopping_list::where('user_id', $request->user_id)->get();

            foreach($shoppingList as $sl){
                $sl->item;
            }

            $smartShoppingListController = new SmartShoppingListController();
            $smartShoppingList = $smartShoppingListController->index($request->user_id);

            $todaysDate = date('l \t\h\e jS');
            $greeting = "Your shopping list";
            $title = "Your Shopping List For " . $todaysDate;

            Mail::send('emails.send', ['title' => $title, 'shoppingList' => $shoppingList, 'smartShoppingList' => $smartShoppingList], 
                function ($m) use ($greeting)
                {
                    $m->from('TheWizard@PantryWizard.app', 'Pantry Wizard Shopping List');
                    $m->to('azathoth.hp@gmail.com')->subject($greeting);
                });
            return response()->json($shoppingList);
        }catch(\Exception $e){
            Log::critical($e->getMessage());
            return response()->json(array('message' => "Contact support with time that error occurred."), 500);
        }
    }
}
?>