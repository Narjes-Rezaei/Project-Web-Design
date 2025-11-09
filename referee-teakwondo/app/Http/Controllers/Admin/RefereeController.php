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
    function showReferee(){
        $referees = Referee::with(['gender', 'degree', 'province'])->get();

        return view('admin/referee/show-referee')->with('referees', $referees);

    }

    function addReferee(){
        $genders = Gender::all();
        $degrees = Degree::all();
        $provinces = Province::all();
        return view('admin/referee/add-referee')
        ->with('genders' , $genders)
        ->with('degrees' , $degrees)
        ->with('provinces' , $provinces);
    }

    function storeReferee(StoreRefereeRequest $request){

        // dd($request);

        $request->validated();

        $referee = new Referee();

        // if($request->hasFile('image')){
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('refereeProfile'), $imageName);
        //     $referee->image = $imageName;
        // }

        $referee->referee_id = time();
        $referee->name = $request->name;
        $referee->family = $request->family;
        $referee->national_code = $request->national_code;
        $referee->email = $request->email;
        $referee->phone = $request->phone;
        $referee->gender_id = $request->gender;
        $referee->degree_id = $request->degree;
        $referee->province_id = $request->province;
        $referee->birth_year = time();
        $referee->password = Hash::make($request->password);



        $referee->save();

        return redirect()->route('show-referee')->with('success', 'Referee Added!');
    }

    function editReferee($id){
        $referee = Referee::find($id);

        return view('admin/referee/edit-referee')->with('referee', $referee);

    }



    function updateReferee($id, UpdateRefereeRequest $request){
        // $request->validated();

        $referee = Referee::find($id);

        if($request->hasFile('photo')){
            $photo = public_path('refereeProfile/'.$referee->photo);
            if(File::exists($photo)){
                File::delete($photo);
            }

            $photo = $request->file('photo');
            $photoName = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('refereeProfile'),$photoName);
            $referee->photo = $photoName;
        }


        if($request->filled('name')){
            $referee->name = $request->name;
        }

        if($request->filled('family')){
            $referee->family = $request->family;
        }

        if($request->filled('email')){
            $referee->email = $request->email;
        }
        if($request->filled('phone')){
            $referee->phone = $request->phone;
        }
        if($request->filled('password')){
            $referee->password = $request->password;
        }

        $referee->update();

        return redirect()->route('zodiac')->with('success', 'Referee Updated');
    
    }

    function removeReferee($id){
        $referee = Referee::find($id);

        $photo = public_path('refereeProfile/'. $referee->photo);

        if(File::exists($photo)){
            File::delete($photo);
        }

        $referee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Referee Removed',
        ], 201);
    }
}
