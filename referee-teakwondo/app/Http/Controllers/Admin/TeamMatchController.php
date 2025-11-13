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


        $teams = Team::all();


        return view('admin/teamMatch/show-team-match')
            ->with('matches', $matches)
            ->with('matchmodel', $matchmodel)
            ->with('teams', $teams);
    }


    function storeTeamMatch(StoreTeamMatchRequest $request, $id)
    {

        // dd($request);

        $request->validated();

        DB::table('team_match')->insert([
            'match_id' => $id,
            'team1_id' => $request->team1,
            'team2_id' => $request->team2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('show-team-match', [$id])->with('success', 'Team Match Added!');
    }


    function removeTeamMatch($id)
    {
        dd($id);
        DB::table('team_match')->where('id', 5)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team Match Removed',
        ], 201);
    }
}
