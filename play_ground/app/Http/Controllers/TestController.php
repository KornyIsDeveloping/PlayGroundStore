<?php

namespace App\Http\Controllers;

use App\Jobs\TestJob;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        TestJob::dispatch();
        return view('acum merge queue');
    }
}
