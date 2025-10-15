<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    function master(){
        return view('index/master');
    }

    function matches(){
        return view('index/pages/matches');
    }

    function players(){
        return view('index/pages/players');
    }

    function blog(){
        return view('index/pages/blog');
    }

    function contact(){
        return view('index/pages/contact');
    }




}
