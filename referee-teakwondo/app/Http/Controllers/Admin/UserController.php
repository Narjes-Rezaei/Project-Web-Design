<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreUserRequest;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // function showUser(){
    //     $users = User::all();

    //     return view('admin/user/show-user')->with('users', $users);

    // }

    function addUser(){
        return view('admin/user/add-user');
    }

    function storeUser(StoreUserRequest $request){

        // $request->validated();

        $user = new user();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile'), $imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->family = $request->family;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('zodiac')->with('success', 'User Added!');
    }
}
