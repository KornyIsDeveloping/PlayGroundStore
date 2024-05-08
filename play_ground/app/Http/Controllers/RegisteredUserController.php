<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * @return Factory|View|\Illuminate\Foundation\Application|Application
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }

    /**
     * @return RedirectResponse
     */
    public function store()
    {
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
        return redirect()->route('products.index');
    }
}









