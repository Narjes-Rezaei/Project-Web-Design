<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenderRequest;
use App\Http\Requests\UpdateGenderRequest;
use App\Models\Admin\Gender;

class GenderController extends Controller
{
    
    function showGender(){
        $genders = Gender::all();

        return view('admin/gender/show-gender')->with('genders', $genders);

    }
    function addGender(){

        return view('admin/gender/add-gender');

    }
    function storeGender(StoreGenderRequest $request){

        $request->validated();

        $gender = new Gender();

        $gender->name = $request->name;

        $gender->save();

        return redirect()->route('show-gender')->with('success' , 'Gender Added');


    }
    function editGender($id){
        $gender = Gender::find($id);

        return view('admin/gender/edit-gender')->with('gender' , $gender);
    }
    function updateGender(UpdateGenderRequest $request , $id){

        $request->validated();

        $gender = Gender::find($id);

        $gender->name = $request->name;

        $gender->update();

        return redirect()->route('show-gender')->with('success' , 'Gender Updated');

    }
    function removeGender($id){
        $gender = Gender::find($id);

        $gender->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gender Removed',
        ], 201);
    }
}
