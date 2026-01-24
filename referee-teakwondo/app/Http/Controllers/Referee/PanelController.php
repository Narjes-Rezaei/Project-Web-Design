<?php

namespace App\Http\Controllers\Referee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    function panelReferee(){

        $referee = Auth::guard('referee')->user();

        return view('referee.referee-profile')
        ->with('referee' , $referee);
    }
}
