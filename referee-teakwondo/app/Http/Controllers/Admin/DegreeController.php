<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Models\Admin\Degree;

class DegreeController extends Controller
{

    function showDegree()
    {
        $degrees = Degree::all();

        return view('admin/degree/show-degree')->with('degrees', $degrees);
    }
    function addDegree()
    {

        return view('admin/degree/add-degree');
    }
    function storeDegree(StoreDegreeRequest $request)
    {

        $request->validated();

        $degree = new Degree();

        $degree->name = $request->name;
        $degree->level = $request->level;

        $degree->save();

        return redirect()->route('show-degree')->with('success', 'Degree Added');
    }
    function editDegree($id)
    {
        $degree = Degree::find($id);

        return view('admin/degree/edit-degree')->with('degree', $degree);
    }
    function updateDegree(UpdateDegreeRequest $request, $id)
    {

        $request->validated();

        $degree = Degree::find($id);

        $degree->name = $request->name;
        $degree->level = $request->level;

        $degree->update();

        return redirect()->route('show-degree')->with('success', 'Degree Updated');
    }
    function removeDegree($id)
    {
        $degree = Degree::find($id);

        $degree->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gegree Removed',
        ], 201);
    }
}
