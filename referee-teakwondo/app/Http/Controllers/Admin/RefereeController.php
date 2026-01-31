<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRefereeRequest;
use App\Http\Requests\UpdateRefereeRequest;
use App\Models\Admin\Degree;
use App\Models\Admin\Gender;
use App\Models\Admin\Province;
use App\Models\Home\Referee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class RefereeController extends Controller
{


    private function generateUniqueRefereeCode()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Referee::where('referee_id', $code)->exists());

        return $code;
    }



    function showReferee()
    {
        $referees = Referee::with(['gender', 'degree', 'province'])->get();

        return view('admin/referee/show-referee')->with('referees', $referees);
    }

    function addReferee()
    {
        $genders = Gender::all();
        $degrees = Degree::all();
        $provinces = Province::all();
        return view('admin/referee/add-referee')
            ->with('genders', $genders)
            ->with('degrees', $degrees)
            ->with('provinces', $provinces);
    }

    function storeReferee(StoreRefereeRequest $request)
    {

        // dd($request);

        $request->validated();

        $referee = new Referee();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('refereeProfile'), $imageName);
            $referee->image = $imageName;
        }

        $referee->referee_id = $this->generateUniqueRefereeCode();
        $referee->name = $request->name;
        $referee->family = $request->family;
        $referee->national_code = $request->national_code;
        $referee->email = $request->email;
        $referee->phone = $request->phone;
        $referee->gender_id = $request->gender;
        $referee->degree_id = $request->degree;
        $referee->province_id = $request->province;
        $referee->birth_year = $request->birth_year;
        $referee->password = Hash::make($request->password);



        $referee->save();

        return redirect()->route('show-referee')->with('success', 'Referee Added!');
    }

    function editReferee($id)
    {

        $referee = Referee::where('referee_id', $id)->first();
        $degrees = Degree::all();
        $genders = Gender::all();
        $provinces = Province::all();

        return view('admin/referee/edit-referee')
            ->with('referee', $referee)
            ->with('degrees', $degrees)
            ->with('genders', $genders)
            ->with('provinces', $provinces);
    }



    function updateReferee($id, UpdateRefereeRequest $request)
    {

        // $request->validated();

        $referee = Referee::where('referee_id', $id)->first();

        if ($request->hasFile('photo')) {
            $photo = public_path('refereeProfile/' . $referee->image);
            if (File::exists($photo)) {
                File::delete($photo);
            }

            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('refereeProfile'), $photoName);
            $referee->image = $photoName;
        }


        if ($request->filled('name')) {
            $referee->name = $request->name;
        }

        if ($request->filled('national_code')) {
            $referee->national_code = $request->national_code;
        }

        if ($request->filled('family')) {
            $referee->family = $request->family;
        }

        if ($request->filled('birth_year')) {
            $referee->birth_year = $request->birth_year;
        }

        if ($request->filled('email')) {
            $referee->email = $request->email;
        }

        if ($request->filled('phone')) {
            $referee->phone = $request->phone;
        }

        if ($request->filled('password')) {
            $referee->password = Hash::make($request->password);
        }

        if ($request->filled('gender')) {
            $referee->gender_id = $request->gender;
        }

        if ($request->filled('degree')) {
            $referee->degree_id = $request->degree;
        }

        if ($request->filled('province')) {
            $referee->province_id = $request->province;
        }

        $referee->update();

        return redirect()->route('show-referee')->with('success', 'Referee Updated');
    }

    function removeReferee($id)
    {
        $referee = Referee::where('referee_id', $id)->first();


        $photo = public_path('refereeProfile/' . $referee->image);

        if (File::exists($photo)) {
            File::delete($photo);
        }

        $referee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Referee Removed',
        ], 201);
    }
}
