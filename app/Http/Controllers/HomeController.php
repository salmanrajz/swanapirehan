<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(Request $request){
        return view('front.home');
    }
    public function contact(Request $request){
        return view('front.contact-us');
    }
    //
}
