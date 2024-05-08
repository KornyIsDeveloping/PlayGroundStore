<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //dispatch job to send email
        dispatch(new SendContactEmail($request->all()));

        return back()->with('success', 'Your message has been sent!');
    }
}
