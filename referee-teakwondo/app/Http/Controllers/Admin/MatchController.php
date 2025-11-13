<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Models\Admin\EventRank;
use App\Models\Admin\EventType;
use App\Models\Admin\GameMatch;
use App\Models\Admin\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MatchController extends Controller
{
    function showMatch()
    {
        $matches = GameMatch::with(['eventRank', 'province', 'eventType'])->get();

        return view('admin/match/show-match')->with('matches', $matches);
    }

    function addMatch()
    {
        $provinces = Province::all();
        $eventRanks = EventRank::all();
        $eventTypes = EventType::all();
        return view('admin/match/add-match')
            ->with('provinces', $provinces)
            ->with('eventRanks', $eventRanks)
            ->with('eventTypes', $eventTypes);
    }

    function storeMatch(StoreMatchRequest $request)
    {

        $request->validated();

        $match = new GameMatch();

        $match->event_title = $request->event_title;
        $match->event_date = $request->event_date;
        $match->event_type_id = $request->event_type;
        $match->province_id = $request->province;
        $match->event_rank_id = $request->event_rank;


        $match->save();

        return redirect()->route('show-match')->with('success', 'Match Added!');
    }

    function editMatch($id)
    {
        $match = GameMatch::find($id);

        return view('admin/match/edit-match')->with('match', $match);
    }



    function updateMatch($id, UpdateMatchRequest $request)
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

        return redirect()->route('show-match')->with('success', 'Match Updated');
    }

    function removeMatch($id)
    {
        $match = GameMatch::find($id);

        $match->delete();

        return response()->json([
            'success' => true,
            'message' => 'Member Removed',
        ], 201);
    }
}
