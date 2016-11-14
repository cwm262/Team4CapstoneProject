<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;

use pantryApp\Http\Requests;
use pantryApp\User;
use pantryApp\shopping_list;
use pantryApp\Item;

use Mail;

class EmailController extends Controller
{   
    public function send(Request $request){
        date_default_timezone_set('America/Chicago');
        $listItems = [];
        $count = 0;
        $user = User::where('id', $request->user_id)->get();
        $user = $user[0];
        $yourShoppingList = '';
        $shoppingList = shopping_list::where('user_id', $user->id)->get();
        $size = count($shoppingList);

       foreach ($shoppingList as $ii){
           $amount = $ii->quantity;    
            $listItems[$count] = Item::where('item_id', $ii->item_id)->orderby('item_name', 'asc')->get();         
            $yourShoppingList .= $listItems[$count][0]->item_name . '- ' . $amount;          
            if ($size-1 > $count){
                $yourShoppingList .= ", \n\n";
            }
           $count++;
       }
        $todaysDate = date('l \t\h\e jS');
        $greeting = "Your shopping list";
        $title = "Your Shopping List For " . $todaysDate;
        $description = $yourShoppingList;
        
        //return $greeting . "\n\n" . $title . "\n" . $description;
        Mail::send('emails.send', ['title' => $title, 'description' => $description,], 
            function ($m) use ($greeting)
            {
                $m->from('TheWizard@PantryWizard.app', 'Pantry Wizard Shopping List');
                $m->to('azathoth.hp@gmail.com')->subject($greeting);
            });
        return response()->json(['message' => 'Request completed']);   
    }
}
?>