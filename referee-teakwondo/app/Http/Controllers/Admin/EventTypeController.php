<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventTypeRequest;
use App\Http\Requests\UpdateEventTypeRequest;
use App\Models\Admin\EventType;


class EventTypeController extends Controller
{
    //
    function showEventType(){
        $eventTypes = EventType::all();

        return view('admin/eventType/show-event-type')->with('eventTypes', $eventTypes);

    }
    function addEventType(){

        return view('admin/eventType/add-event-type');

    }
    function storeEventType(StoreEventTypeRequest $request){

        $request->validated();

        $eventType = new EventType();

        $eventType->name = $request->name;

        $eventType->save();

        return redirect()->route('show-event-type')->with('success' , 'Event Type Added');


    }
    function editEventType($id){
        $eventType = EventType::find($id);

        return view('admin/eventType/edit-event-type')->with('eventType' , $eventType);
    }
    function updateEventType(UpdateEventTypeRequest $request , $id){

        $request->validated();

        $eventType = EventType::find($id);

        $eventType->name = $request->name;

        $eventType->update();

        return redirect()->route('show-event-type')->with('success' , 'Event Type Updated');

    }
    function removeEventType($id){
        $eventType = EventType::find($id);

        $eventType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event Type Removed',
        ], 201);
    }
}