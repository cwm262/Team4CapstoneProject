<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;
//use pantryApp\ModelName;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Create variables here. Assign to php variable.
        //example: $query1 = ModelName::find($id);
        //Or whatever other laravel queries you need to run.
        //return view('chris') like below, but modified:
        //return view('chris', ['query1' => $query1]);
        //We're returning what we assigned to $query 1 in an array, naming its key query1. So you can access it on chris.php. 
        //See resources/views/chris.php. 
        //print_r($query1) say or however else you want to dispay it. Like normal. 
        return view('chris');
    }
}
