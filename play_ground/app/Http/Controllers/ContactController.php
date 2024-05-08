<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function send(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

//        $details = $request->only(['first_name', 'last_name', 'email', 'message']);
        $details = [
            'name' => $request->input('first-name') . ' ' . $request->input('last-name'),
            'email' => $request->email,
            'message' => $request->message,
        ];

//        Mail::to('motanutzu2@gmail.com')->send(new ContactFormMail($details));
        try {
            Mail::to('motanutzu2@gmail.com')->send(new ContactFormMail($details));
        } catch (Exception $e) {
            Log::error('Mail send error: ' . $e->getMessage());
            return back()->withErrors('Mail could not be sent. Please check logs.');
        }

        return back()->with('success', 'Your message has been sent!');
    }
}
