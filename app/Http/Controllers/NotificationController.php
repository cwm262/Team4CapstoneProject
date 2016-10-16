<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;

use pantryApp\Http\Requests;
use pantryApp\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function urgent($user_id){
        //Do database lookups
        //Find all inventory items where expiration is < x number of days
        //return json
    }

    public function recipes($user_id){
        //Create an algorithm/query to build a list of recipe suggestions
        //Return json
    }
}
