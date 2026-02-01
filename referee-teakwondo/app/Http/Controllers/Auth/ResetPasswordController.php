<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResetPasswordController extends Controller
{
    function resetPassword(){
        return view('auth/reset-password');
    }

    function storePassword(Request $request){
        $user = User::where('email' , $request->email)->get()->first();
        $user->password = Hash::make($request->password);
        
        $user->update();

        return redirect()->route('login');
    }
}
