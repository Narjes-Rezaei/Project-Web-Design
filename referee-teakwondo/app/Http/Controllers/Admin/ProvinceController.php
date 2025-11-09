<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvinceRequest;
use App\Http\Requests\UpdateProvinceRequest;
use App\Models\Admin\Province;

class ProvinceController extends Controller
{
    //
    function showProvince(){
        $provinces = Province::all();

        return view('admin/province/show-province')->with('provinces', $provinces);

    }
    function addProvince(){

        return view('admin/province/add-province');

    }
    function storeProvince(StoreProvinceRequest $request){

        $request->validated();

        $province = new Province();

        $province->name = $request->name;

        $province->save();

        return redirect()->route('show-province')->with('success' , 'Province Added');


    }
    function editProvince($id){
        $province = Province::find($id);

        return view('admin/province/edit-province')->with('province' , $province);
    }
    function updateProvince(UpdateProvinceRequest $request , $id){

        $request->validated();

        $province = Province::find($id);

        $province->name = $request->name;

        $province->update();

        return redirect()->route('show-province')->with('success' , 'Province Updated');

    }
    function removeProvince($id){
        $province = Province::find($id);

        $province->delete();

        return response()->json([
            'success' => true,
            'message' => 'Province Removed',
        ], 201);
    }
}
