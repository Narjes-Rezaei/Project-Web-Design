<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GameMatch;
use App\Models\Home\Referee;
use Illuminate\Http\Request;

class RefereeMatchController extends Controller
{

    function refereeMatch($id)
    {
        $gameMatch = GameMatch::findOrFail($id);

        $referees = Referee::all();

        $refereeGame = $gameMatch->referees->pluck('id')->toArray();

        return view('admin/refereeMatch/referee-match')
            ->with('gameMatch', $gameMatch)
            ->with('referees', $referees)
            ->with('refereeGame', $refereeGame);
    }


    function updateRefereeMatch($id, Request $request)
    {

        dd($request);
        
    }
}
