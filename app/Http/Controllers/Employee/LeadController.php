<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadRemark;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with(['latestRemark'])
            ->where('assigned_to', auth()->id());
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $leads = $query->orderBy('created_at', 'desc')->paginate(20);
        
        return view('employee.leads.index', compact('leads'));
    }

    public function show(Lead $lead)
    {
        $this->authorizeAccess($lead);
        
        $lead->load(['remarks.user']);
        
        return view('employee.leads.show', compact('lead'));
    }

    public function addRemark(Request $request, Lead $lead)
    {
        $this->authorizeAccess($lead);
        
        $request->validate([
            'remark' => 'required|string',
            'status' => 'nullable|in:pending,contacted,converted,lost,follow_up',
            'follow_up_time' => 'nullable|date',
        ]);
        
        LeadRemark::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'remark' => $request->remark,
            'status' => $request->status,
            'follow_up_time' => $request->follow_up_time,
        ]);
        
        if ($request->status) {
            $lead->update(['status' => $request->status]);
        }
        
        return redirect()->back()->with('success', 'Remark added successfully.');
    }

    private function authorizeAccess(Lead $lead)
    {
        if ($lead->assigned_to !== auth()->id()) {
            abort(403);
        }
    }
}