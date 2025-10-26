<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin(){
        $users = User::all();
        return view('admin.dashboard')->with('users',$users);
    }
}
