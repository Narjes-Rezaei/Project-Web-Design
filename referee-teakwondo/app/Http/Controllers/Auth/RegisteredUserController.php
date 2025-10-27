<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.sign');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {

        // $request->validated();

        $user = new User();
        $user->name = $request->name;
        $user->family = $request->family;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('userProfile'),$imageName);
            $user->photo = $imageName;
        }

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('/', absolute: false));
    }
}
