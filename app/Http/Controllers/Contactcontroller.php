<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
 use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function show()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission
     */
  

public function submit(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'subject' => 'required|string|max:255',
        'message' => 'required|string|min:10',
    ]);

    try {
        Mail::to('mhfaeez121@gmail.com')->send(new ContactFormMail($validated));
        Mail::to($validated['email'])->send(new ContactFormMail($validated, true));

        return redirect()
            ->back()
            ->with('success', 'Thank you for your message! We will get back to you shortly.');

    } catch (\Exception $e) {

        // ✅ ERROR LOGGING
        Log::error('Contact Form Mail Error', [
            'message' => $e->getMessage(),
            'file'    => $e->getFile(),
            'line'    => $e->getLine(),
            'trace'   => $e->getTraceAsString(),
        ]);

        return redirect()
            ->back()
            ->with('error', 'Failed to send message. Please try again later.')
            ->withInput();
    }
}

}