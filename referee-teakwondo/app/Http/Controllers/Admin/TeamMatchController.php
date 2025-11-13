<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamMatchRequest;
use App\Http\Requests\UpdateTeamMatchRequest;
use App\Models\Admin\GameMatch;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamMatchController extends Controller
{
    function showTeamMatch()
    {
        $matches = GameMatch::with('teams')->get();
        
        return view('admin/match/add-team-match')->with('matches', $matches);
    }

    function addTeamMatch()
    {
        $team1 = Team::all();
        $team2 = Team::all();
        $gameMatch = GameMatch::all();
        return view('admin/match/add-team-match')
            ->with('team1', $team1)
            ->with('team2', $team2)
            ->with('gameMatch', $gameMatch);
    }

    function storeTeamMatch(StoreTeamMatchRequest $request)
    {

        $request->validated();

        DB::table('team_match')->insert([
            'match_id' => $request->match_id,
            'team1_id' => $request->team1,
            'team2_id' => $request->team2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('show-team-match')->with('success', 'Team Match Added!');
    }

    function editTeamMatch($id)
    {
        $match = GameMatch::find($id);

        return view('admin/match/edit-match')->with('match', $match);
    }



    function updateTeamMatch($id, UpdateTeamMatchRequest $request)
    {
        // $request->validated();

        $match = GameMatch::find($id);


        if ($request->filled('event_title')) {
            $match->event_title = $request->event_title;
        }

        if ($request->filled('event_date')) {
            $match->event_date = $request->event_date;
        }

        $match->update();

        return redirect()->route('show-team-match')->with('success', 'Team Match Updated');
    }

    function removeTeamMatch($id)
    {
        $match = GameMatch::find($id);

        $match->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team Match Removed',
        ], 201);
    }
}
