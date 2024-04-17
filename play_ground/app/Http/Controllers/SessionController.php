<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        return view('auth.login');
    }

    public function store() {
        dd('todo');
    }
}
