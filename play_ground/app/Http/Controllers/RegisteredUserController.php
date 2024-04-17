<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }

    /**
     * @return void
     */
    public function store() {
        //validate
        $attributes = request()->validate([
           'first_name' => ['required'],
           'last_name' => ['required'],
           'email' => ['required', 'email', 'max:255'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        //create the user
        $user = User::create($attributes);

        //log in
        Auth::login($user);

        //redirect somewhere
        return redirect('/products');
    }
}
