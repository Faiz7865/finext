<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\LeadFormMail;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    /**
     * Show the lead form
     */
    public function show()
    {
        return view('lead');
    }

    /**
     * Handle the lead form submission
     */
    public function submit(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'service_type' => 'required|string',
            'budget' => 'required|string',
            'project_description' => 'required|string|min:20',
            'agree_terms' => 'accepted',
        ]);

        try {
            // Send email to admin (test@yopmail.com)
            Mail::to('mhfaeez121@gmail.comProfile image')->send(new LeadFormMail($validated));

            // Send confirmation email to the user
            Mail::to($validated['email'])->send(new LeadFormMail($validated, true));

            return redirect()
                ->back()
                ->with('success', 'Thank you for your interest! Our team will contact you shortly to discuss your project.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to submit your information. Please try again later.')
                ->withInput();
        }
    }
}