<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Manual admin check
        if (Auth::check() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        // FIX 1: Use safer relationship loading
        $latestLeads = Lead::query()
            ->with([
                'assignedTo:id,name,email',  // Only select needed columns
                'remarks:id,lead_id,user_id,remark,created_at'  // Only select needed columns
            ])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        // FIX 2: Use more reliable stats queries
        $stats = [
            'total_leads' => Lead::count(),
            'pending_leads' => Lead::where('status', 'pending')->count(),
            'verified_leads' => Lead::where('status', 'verified')->count(),
            'converted_leads' => Lead::where('status', 'converted')->count(),
            'total_employees' => User::where('role', 'employee')->where('is_active', true)->count(),
        ];

        return view('admin.dashboard', compact('latestLeads', 'stats'));
    }
}