<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Lead;

class DashboardController extends Controller
{
    public function index()
    {
        $latestLeads = Lead::with(['latestRemark'])
            ->where('assigned_to', auth()->id())
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
            
        $stats = [
            'total_assigned' => Lead::where('assigned_to', auth()->id())->count(),
            'pending' => Lead::where('assigned_to', auth()->id())->where('status', 'pending')->count(),
            'contacted' => Lead::where('assigned_to', auth()->id())->where('status', 'contacted')->count(),
            'converted' => Lead::where('assigned_to', auth()->id())->where('status', 'converted')->count(),
        ];
        
        return view('employee.dashboard', compact('latestLeads', 'stats'));
    }
}