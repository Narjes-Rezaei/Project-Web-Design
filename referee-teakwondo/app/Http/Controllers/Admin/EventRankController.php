<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRankRequest;
use App\Http\Requests\UpdateEventRankRequest;
use App\Models\Admin\EventRank;
use Illuminate\Http\Request;
use Illuminate\Support\Testing\Fakes\EventFake;

class EventRankController extends Controller
{
    //
    function showEventRank(){
        $eventRanks = EventRank::all();

        return view('admin/eventRank/show-event-rank')->with('eventRanks', $eventRanks);

    }
    function addEventRank(){

        return view('admin/eventRank/add-event-rank');

    }
    function storeEventRank(StoreEventRankRequest $request){

        $request->validated();

        $eventRank = new EventRank();

        $eventRank->name = $request->name;

        $eventRank->save();

        return redirect()->route('show-event-rank')->with('success' , 'Event Rank Added');


    }
    function editEventRank($id){
        $eventRank = EventRank::find($id);

        return view('admin/eventRank/edit-event-rank')->with('eventRank' , $eventRank);
    }
    function updateEventRank(UpdateEventRankRequest $request , $id){

        $request->validated();

        $eventRank = EventRank::find($id);

        $eventRank->name = $request->name;

        $eventRank->update();

        return redirect()->route('show-event-rank')->with('success' , 'Event Rank Updated');

    }
    function removeEventRank($id){
        $eventRank = EventRank::find($id);

        $eventRank->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event Rank Removed',
        ], 201);
    }
}
