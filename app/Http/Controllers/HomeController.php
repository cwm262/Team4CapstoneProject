<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
    public function getFoodsAboutToExpire($user_id)
    {

    }
    public function getFoodsExpired($user_id)
    {
        $item = $groceriesInInventory::find($user_id);
        
        while($item){
            $expDate = $item->expiration;
            $bought = $item->created_at;
            $expTime = $expDate - $expTime;
            if ($expTime < 3)
            {
                return $item;
            }
            else
            {
                return 0;
            }
        }
            
    }
    public function getFoodsLowStock($user_id)
    {

    }
    public function getRecepeSuggestion($user_id)
    {

    }
    public function getFoodsNotUsed($user_id)
    {

    }
}
