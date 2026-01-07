<?php

namespace App\Http\Controllers;

use App\Models\Admin\GameMatch;
use App\Models\Home\Referee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class SelectRefereeController extends Controller
{
    function refereeMatch($id)
    {
        $match = GameMatch::find($id);


        $selectedReferees = DB::table('referee_match')
            ->join('referees', 'referee_match.referee_id', '=', 'referees.referee_id')
            ->leftJoin('genders', 'referees.gender_id', '=', 'genders.id')
            ->leftJoin('degrees', 'referees.degree_id', '=', 'degrees.id')
            ->leftJoin('provinces', 'referees.province_id', '=', 'provinces.id')
            ->select(
                'referees.referee_id',
                'referees.image',
                'referees.name',
                'referees.family',
                'genders.name as gender_name',
                'degrees.name as degree_name',
                'provinces.name as province_name',
                'referee_match.match_id'
            )->get();

        // dd($selectedReferees);
        $referees = Referee::all();
        return view('admin/refereeMatch/referee-match')
            ->with('match', $match)
            ->with('selectedReferees', $selectedReferees)
            ->with('referees', $referees);
    }

    function storeRefereeMatch(){

    }

    function removeRefereeMatch($id,$match_id){

        DB::table('referee_match')
        ->where('match_id' , $match_id)
        ->delete();
        
    }

    function updateRefereeMatch($id, Request $request){
        dd($request);
    }

    //  function editRefereeMatch(){
        
    // }

    //  function editRefereeMatch(){
        
    // }

    //  function editRefereeMatch(){
        
    // }

    //  function editRefereeMatch(){
        
    // }
}
