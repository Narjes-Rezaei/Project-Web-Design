<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function profile()
    {
        $user = Auth::user();

        return view('auth.profile')->with('user', $user);
    }

    function updateProfile(Request $request)
    {
        //$request->validated();

        $user = Auth::user();
        // dd($user);

        if ($user->email !== $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
        }

        $user->name = $request->name;
        $user->family = $request->family;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $oldPhotoPath = public_path('userProfile/' . $user->photo);
            if ($user->image && $user->image !== 'profile.png' && File::exists($oldPhotoPath)) {
                File::delete($oldPhotoPath);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('userProfile'), $imageName);
            $user->photo = $imageName;
        }


        $user->save();

        return Redirect::route('profile')->with('success', 'Profile Updated');
    }
}
