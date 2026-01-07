<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Admin\Gender;
use App\Models\Admin\Member;
use App\Models\Admin\Province;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    function showMemeber()
    {
        $members = Member::with(['gender', 'province', 'team'])->get();

        return view('admin/member/show-member')->with('members', $members);
    }

    function addMember()
    {
        $genders = Gender::all();
        $provinces = Province::all();
        $teams = Team::all();
        return view('admin/member/add-member')
            ->with('genders', $genders)
            ->with('provinces', $provinces)
            ->with('teams', $teams);
    }

    function storeMember(StoreMemberRequest $request)
    {

        $request->validated();

        $member = new Member();

        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('memberProfile'), $imageName);
        //     $member->image = $imageName;
        // }

        $member->name = $request->name;
        $member->family = $request->family;
        $member->gender_id = $request->gender;
        $member->province_id = $request->province;
        $member->team_id = $request->team;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->birth_date = $request->birth_date;


        $member->save();

        return redirect()->route('show-member')->with('success', 'Member Added!');
    }

    function editMember($id)
    {
        $member = Member::where('id', $id)->first();
        $teams = Team::all();
        $genders = Gender::all();
        $provinces = Province::all();

        return view('admin/member/edit-member')
            ->with('member', $member)
            ->with('teams', $teams)
            ->with('genders', $genders)
            ->with('provinces', $provinces);
    }



    function updateMember($id, UpdateMemberRequest $request)
    {
        // $request->validated();

        $member = Member::where('id', $id)->first();

        if ($request->hasFile('photo')) {
            $photo = public_path('memberProfile/' . $member->photo);
            if (File::exists($photo)) {
                File::delete($photo);
            }

            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('memberProfile'), $photoName);
            $member->photo = $photoName;
        }


        if ($request->filled('name')) {
            $member->name = $request->name;
        }

        if ($request->filled('family')) {
            $member->family = $request->family;
        }

        if ($request->filled('birth_date')) {
            $member->email = $request->email;
        }

        if ($request->filled('email')) {
            $member->email = $request->email;
        }

        if ($request->filled('phone')) {
            $member->phone = $request->phone;
        }

        if ($request->filled('gender')) {
            $member->gender_id = $request->gender;
        }

        if ($request->filled('team')) {
            $member->team_id = $request->team;
        }

        if ($request->filled('province')) {
            $member->province_id = $request->province;
        }
        $member->update();

        return redirect()->route('show-member')->with('success', 'Member Updated');
    }

    function removeMember($id)
    {
        $member = Member::find($id);

        $photo = public_path('memberProfile/' . $member->photo);

        if (File::exists($photo)) {
            File::delete($photo);
        }

        $member->delete();

        return response()->json([
            'success' => true,
            'message' => 'Member Removed',
        ], 201);
    }
}
