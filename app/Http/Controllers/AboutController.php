<?php

namespace pantryApp\Http\Controllers;

use Illuminate\Http\Request;

use pantryApp\Http\Requests;

class AboutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('about');
    }
}
