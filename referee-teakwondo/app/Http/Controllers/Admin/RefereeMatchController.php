<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GameMatch;
use App\Models\Home\Referee;
use Illuminate\Http\Request;

class RefereeMatchController extends Controller
{

    function refereeMatch($id)
    {
        $gameMatch = GameMatch::findOrFail($id);

        $referees = Referee::all();

        $refereeGame = $gameMatch->referees->pluck('id')->toArray();

        return view('admin/refereeMatch/referee-match')
            ->with('gameMatch', $gameMatch)
            ->with('referees', $referees)
            ->with('refereeGame', $refereeGame);
    }


    function updateRefereeMatch($id, Request $request)
    {

        DB::table('permission_user')->where('user_id', $id)->delete();
        DB::table('role_user')->where('user_id', $id)->delete();

        $user = User::findOrFail($id);


        if ($request->has('permissions')) {
            $request->validate([
                'permissions' => 'array',
                'permissions.*' => 'exists:permissions,id'
            ]);
        }
        if ($request->has('roles')) {
            $request->validate([
                'roles' => 'array',
                'roles.*' => 'exists:roles,id'
            ]);
        }

        $permissions = $request->input('permissions', []);
        $roles = $request->input('roles', []);
        $user->permissions()->sync($permissions);
        $user->roles()->sync($roles);


        return redirect('zodiac')->with('success', 'Access Updated!');
    }
}
