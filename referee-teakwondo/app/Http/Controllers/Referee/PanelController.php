<?php

namespace App\Http\Controllers\Referee;

use App\Http\Controllers\Controller;
use App\Models\Admin\GameMatch;
use App\Models\Admin\Team;
use App\Models\Home\Referee;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    function panelReferee()
    {

        $referee = Auth::guard('referee')->user();

        return view('referee.referee-profile')
            ->with('referee', $referee);
    }

    function refereePrint($id)
    {
        $referee = Referee::find($id);

        $pdf = Pdf::loadView('referee.print.referee-form', compact('referee'));

        return $pdf->stream('referee-info.pdf');
    }

    function upcomingMatch()
    {
        // find id match this referee
        $referee = Auth::guard('referee')->user();
        $rows = DB::table('referee_match')->where([
            'referee_id' => $referee->referee_id
        ])->get();

        // find matches
        $today = Carbon::today();
        $macths_id = $rows->pluck('match_id');

        $matchs = GameMatch::whereIn('id', $macths_id)->whereDate('event_date', '>=', $today)->get();


        return view('referee.show-upcoming-match')->with('matches', $matchs);
    }

    function pastMatch()
    {

        // find id match this referee
        $referee = Auth::guard('referee')->user();
        $rows = DB::table('referee_match')->where([
            'referee_id' => $referee->referee_id
        ])->get();

        // find matches
        $today = Carbon::today();
        $macths_id = $rows->pluck('match_id');

        $matchs = GameMatch::whereIn('id', $macths_id)->whereDate('event_date', '<', $today)->get();


        return view('referee.show-path-match')->with('matches', $matchs);
    }

    function showTeamMatch($id)
    {
        $matchmodel = GameMatch::find($id);
        $teamMatches = DB::table('team_match')->where('match_id', $id)->get();


        $matches = $teamMatches->map(function ($row) {
            return [
                'match_id' => $row->match_id,
                'team1' => Team::find($row->team1_id),
                'team2' => Team::find($row->team2_id),
            ];
        });

        // dd($matches);




        return view('referee/show-team-match')
            ->with('matches', $matches)
            ->with('matchmodel', $matchmodel);
    }

    function showRefereeMatch($id)
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
        foreach ($selectedReferees as $selectedReferee) {
            $idSelectedReferees[] = $selectedReferee->referee_id;
        }

        return view('referee/show-referee-match')
            ->with('match', $match)
            ->with('selectedReferees', $selectedReferees);
    }

    function showDetailsReferee($id)
    {
        $refereeMatch = DB::table('referee_match')->where([
            'match_id' => $id
        ])->get()->first();
        // dd($match);
        return view('referee.show-detailse-referee')->with('refereeMatch' , $refereeMatch);
    }

    function detaiseRefereePrint($id)
    {
        $refereeMatch = DB::table('referee_match')->where([
            'id' => $id
        ])->get()->first();

        $referee = Referee::find($refereeMatch->referee_id);
        $gameMatch = GameMatch::find($refereeMatch->match_id);

        

        $pdf = Pdf::loadView('referee.print.detailse-referee', compact('refereeMatch','referee','gameMatch'));

        return $pdf->stream('referee-details.pdf');
    }
}
