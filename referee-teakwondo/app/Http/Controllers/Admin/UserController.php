<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUserRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    function showUser($id)
    {
        $user = User::find($id);
        return redirect()->back()->with('swal', [
            'title' => '',
            'name' => $user->name,
            'family' => $user->family,
            'phone' => $user->phone,
            'email' => $user->email,
            'image' => $user->image
        ]);
    }

    function addUser()
    {
        return view('admin/user/add-user');
    }

    function storeUser(StoreUserRequest $request)
    {

        // $request->validated();

        $user = new user();

        if ($request->hasFile('image')) {
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

    function editUser($id)
    {
        $user = User::find($id);

        return view('admin/user/edit-user')->with('user', $user);
    }



    function updateUser($id, UpdateUserRequest $request)
    {
        // $request->validated();

        $user = User::find($id);

        if ($request->hasFile('photo')) {
            $photo = public_path('userProfile/' . $user->photo);
            if (File::exists($photo)) {
                File::delete($photo);
            }

            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('userProfile'), $photoName);
            $user->photo = $photoName;
        }


        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('family')) {
            $user->family = $request->family;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        if ($request->filled('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->update();

        return redirect()->route('zodiac')->with('success', 'User Updated');
    }

    function removeUser($id)
    {
        $user = User::find($id);

        $photo = public_path('userProfile/' . $user->photo);

        if (File::exists($photo)) {
            File::delete($photo);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User Removed',
        ], 201);
    }

    function checkSuperUser($id)
    {
        $user = User::find($id);

        $user->super_user ? $user->super_user = 0 : $user->super_user = 1;

        $user->update();
    }


    function checkSttaf($id)
    {
        $user = User::find($id);

        $user->staff ? $user->staff = 0 : $user->staff = 1;

        $user->update();
    }
}
