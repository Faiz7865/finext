<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\LeadFormMail;
use App\Mail\LeadOtpMail;
use App\Models\Lead;
use App\Models\LeadOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function show()
    {
        return view('lead');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'service_type' => 'required|string',
            'budget' => 'required|string',
            'project_description' => 'required|string|min:20',
            'consent_communications' => 'accepted',
        ]);

        try {
            DB::beginTransaction();
            
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            
            LeadOtp::where('email', $validated['email'])->delete();
            
            $leadOtp = LeadOtp::create([
                'email' => $validated['email'],
                'otp' => $otp,
                'lead_data' => $validated,
                'expires_at' => now()->addMinutes(10),
                'verified' => false,
            ]);
            
            Mail::to($validated['email'])->send(new LeadOtpMail($otp, $validated['first_name']));
            
            DB::commit();
            
            session(['otp_email' => $validated['email']]);
            
            return redirect()
                ->route('lead.verify')
                ->with('success', 'Please check your email for the verification code.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Lead submission error: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->with('error', 'Failed to process your request. Please try again later.')
                ->withInput();
        }
    }

    public function showVerify()
    {
        if (!session('otp_email')) {
            return redirect()->route('lead');
        }
        
        return view('lead-verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);
        
        $email = session('otp_email');
        
        if (!$email) {
            return redirect()->route('lead');
        }
        
        $leadOtp = LeadOtp::where('email', $email)
            ->where('otp', $request->otp)
            ->first();
        
        if (!$leadOtp || !$leadOtp->isValid()) {
            return redirect()
                ->back()
                ->with('error', 'Invalid or expired verification code. Please try again.');
        }
        
        try {
            DB::beginTransaction();
            
            $leadOtp->update(['verified' => true]);
            
            $data = $leadOtp->lead_data;
            
            $lead = Lead::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'company' => $data['company'],
                'service_type' => $data['service_type'],
                'budget' => $data['budget'],
                'project_description' => $data['project_description'],
                'terms_accepted' => true,
                'consent_communications' => true,
                'status' => 'verified',
                'verified_at' => now(),
            ]);
            
            Mail::to('mhfaeez121@gmail.com')->send(new LeadFormMail($data, false, true));
            Mail::to($data['email'])->send(new LeadFormMail($data, true));
            
            session()->forget('otp_email');
            
            DB::commit();
            
            return redirect()
                ->route('lead')
                ->with('success', 'Thank you for your interest! Our team will contact you shortly to discuss your project.');
                
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Lead verification error: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->with('error', 'Failed to verify. Please try again later.');
        }
    }

    public function resendOtp(Request $request)
    {
        $email = session('otp_email');
        
        if (!$email) {
            return redirect()->route('lead');
        }
        
        $existingOtp = LeadOtp::where('email', $email)->first();
        
        if ($existingOtp && $existingOtp->created_at->diffInSeconds(now()) < 60) {
            return redirect()
                ->back()
                ->with('error', 'Please wait 60 seconds before requesting a new code.');
        }
        
        try {
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            
            if ($existingOtp) {
                $existingOtp->update([
                    'otp' => $otp,
                    'expires_at' => now()->addMinutes(10),
                    'verified' => false,
                ]);
                $data = $existingOtp->lead_data;
            } else {
                return redirect()->route('lead');
            }
            
            Mail::to($email)->send(new LeadOtpMail($otp, $data['first_name']));
            
            return redirect()
                ->back()
                ->with('success', 'A new verification code has been sent to your email.');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to resend code. Please try again.');
        }
    }
}