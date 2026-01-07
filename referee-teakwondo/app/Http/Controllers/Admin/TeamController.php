<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Admin\Gender;
use App\Models\Admin\Province;
use App\Models\Admin\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    function showTeam()
    {
        $teams = Team::with(['gender', 'province'])->get();

        return view('admin/team/show-team')->with('teams', $teams);
    }

    function addTeam()
    {
        $genders = Gender::all();
        $provinces = Province::all();
        return view('admin/team/add-team')
            ->with('genders', $genders)
            ->with('provinces', $provinces);
    }

    function storeTeam(StoreTeamRequest $request)
    {
        
        $request->validated();

        $team = new Team();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('teamLogo'), $imageName);
            $team->logo = $imageName;
        }

        $team->name = $request->name;
        $team->number_of_member = $request->number_of_member;
        $team->gender_id = $request->gender;
        $team->province_id = $request->province;



        $team->save();

        return redirect()->route('show-team')->with('success', 'Team Added!');
    }

    function editTeam($id)
    {
        $team = Team::find($id);
        $genders = Gender::all();
        $provinces = Province::all();

        return view('admin/team/edit-team')
        ->with('team', $team)
        ->with('genders', $genders)
        ->with('provinces', $provinces);
    }



    function updateTeam($id, UpdateTeamRequest $request)
    {
        $request->validated();

        $team = Team::find($id);

        if ($request->hasFile('photo')) {
            $photo = public_path('teamLogo/' . $team->photo);
            if (File::exists($photo)) {
                File::delete($photo);
            }

            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('refereeProfile'), $photoName);
            $team->logo = $photoName;
        }


        if ($request->filled('name')) {
            $team->name = $request->name;
        }

        if ($request->filled('number_of_member')) {
            $team->number_of_member = $request->number_of_member;
        }

        if ($request->filled('gender')) {
            $team->gender_id = $request->gender_id;
        }

        if ($request->filled('province')) {
            $team->province = $request->province;
        }

        $team->update();

        return redirect()->route('show-team')->with('success', 'Team Updated');
    }

    function removeTeam($id)
    {
        $referee = Team::find($id);

        $photo = public_path('teamLogo/' . $referee->photo);

        if (File::exists($photo)) {
            File::delete($photo);
        }

        $referee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Team Removed',
        ], 201);
    }
}
