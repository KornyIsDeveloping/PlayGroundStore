<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        return view('auth.login');
    }

    /**
     * @return void
     * @throws ValidationException
     */
    public function store() {
        //validate
        $attributes = request()->validate([
           'email' => ['required', 'email'],
           'password' => ['required']
        ]);

        //attempt to login the user
        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.'
            ]);
        }
        //regenerate the session token
        request()->session()->regenerate();

        //redirect
        return redirect('/products');
    }

    /**
     * @return void
     */
    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
