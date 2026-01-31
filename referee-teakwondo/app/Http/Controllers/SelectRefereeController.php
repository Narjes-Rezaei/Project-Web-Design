<?php

namespace App\Http\Controllers;

use App\Models\Admin\GameMatch;
use App\Models\Home\Referee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->where([
                'match_id' => $match->id
            ])
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
        
        $idSelectedReferees = [];
        foreach($selectedReferees as $selectedReferee){
            $idSelectedReferees[] = $selectedReferee->referee_id;
        }
        $referees = Referee::all();

        $referees = $referees->reject(function($referee) use ($idSelectedReferees) {
            return in_array($referee->referee_id, $idSelectedReferees);
        });
        return view('admin/refereeMatch/referee-match')
            ->with('match', $match)
            ->with('selectedReferees', $selectedReferees)
            ->with('referees', $referees);
    }


    function removeRefereeMatch($id, $match_id)
    {

        DB::table('referee_match')
            ->where([
                'referee_id' => $id,
                'match_id' => $match_id
            ])
            ->delete();
    }

    public function updateRefereeMatch(Request $request, $id)
    {
        $data = [];

        foreach ($request->roles as $referee_id) {
            $data[] = [
                'match_id'   => $id,
                'referee_id' => $referee_id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('referee_match')->insert($data);

        return redirect()->route('show-match');
    }



    function editRefereeMatch($refree_id, $match_id)
    {
        $referee = Referee::find($refree_id);
        $refreeName = $referee->name.' '.$referee->family;

        

        $matchName = GameMatch::find($match_id)->event_title;

        $row = DB::table('referee_match')->where([
            'referee_id' => $refree_id,
            'match_id' => $match_id
        ])->get()->first();

        // dd($row);
        return view('admin.refereeMatch.edit-referee-match')
        ->with('refereeMatch' , $row)
        ->with('refreeName', $refreeName)
        ->with('matchName', $matchName);
    }

    function completRefreeMatch(Request $request , $id) {
        $is_present = 0;
        $is_observer = 0;
        $is_best_referee = 0;
        if($request->has('is_present')){
            $is_present = 1;
        }
        if($request->has('is_observer')){
            $is_observer = 1;
        }
        if($request->has('is_best_referee')){
            $is_best_referee = 1;
        }

        DB::table('referee_match')
        ->where('id' , $id)
        ->update([
            'score' => $request->score,
            'is_present' => $is_present,
            'is_observer' => $is_observer,
            'is_best_referee' => $is_best_referee
        ]);

        return redirect()->route('show-match');
    }
}
