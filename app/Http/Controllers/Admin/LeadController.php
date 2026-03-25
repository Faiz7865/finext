<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadRemark;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    private function checkAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }
    }

    public function index(Request $request)
    {
        $this->checkAdmin();

        $query = Lead::with(['assignedTo', 'latestRemark', 'remarks.user']);
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('service_type')) {
            $query->where('service_type', $request->service_type);
        }
        
        if ($request->filled('budget')) {
            $query->where('budget', $request->budget);
        }
        
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }
        
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }
        
        $leads = $query->orderBy('created_at', 'desc')->paginate(20);
        $employees = User::where('role', 'employee')->where('is_active', true)->get();
        
        return view('admin.leads.index', compact('leads', 'employees'));
    }

    public function create()
    {
        $this->checkAdmin();
        $employees = User::where('role', 'employee')->where('is_active', true)->get();
        return view('admin.leads.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'service_type' => 'required|string',
            'budget' => 'required|string',
            'project_description' => 'required|string|min:20',
            'status' => 'required|in:pending,verified,contacted,converted,lost',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $validated['terms_accepted'] = true;
        $validated['verified_at'] = now();

        Lead::create($validated);

        return redirect()->route('admin.leads.index')->with('success', 'Lead created successfully.');
    }

    public function show(Lead $lead)
    {
        $this->checkAdmin();
        $lead->load(['assignedTo', 'remarks.user']);
        $employees = User::where('role', 'employee')->where('is_active', true)->get();
        
        return view('admin.leads.show', compact('lead', 'employees'));
    }

    public function edit(Lead $lead)
    {
        $this->checkAdmin();
        $employees = User::where('role', 'employee')->where('is_active', true)->get();
        return view('admin.leads.edit', compact('lead', 'employees'));
    }

    public function update(Request $request, Lead $lead)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'service_type' => 'required|string',
            'budget' => 'required|string',
            'project_description' => 'required|string|min:20',
            'status' => 'required|in:pending,verified,contacted,converted,lost',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $lead->update($validated);

        return redirect()->route('admin.leads.index')->with('success', 'Lead updated successfully.');
    }

    public function destroy(Lead $lead)
    {
        $this->checkAdmin();
        $lead->delete();
        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted successfully.');
    }

    public function assign(Request $request, Lead $lead)
    {
        $this->checkAdmin();

        $request->validate([
            'assigned_to' => 'required|exists:users,id',
        ]);
        
        $lead->update(['assigned_to' => $request->assigned_to]);
        
        return redirect()->back()->with('success', 'Lead assigned successfully.');
    }

    public function addRemark(Request $request, Lead $lead)
    {
        $this->checkAdmin();

        $request->validate([
            'remark' => 'required|string',
            'status' => 'nullable|in:pending,contacted,converted,lost,follow_up',
            'follow_up_time' => 'nullable|date',
        ]);
        
        LeadRemark::create([
            'lead_id' => $lead->id,
            'user_id' => Auth::id(),
            'remark' => $request->remark,
            'status' => $request->status,
            'follow_up_time' => $request->follow_up_time,
        ]);
        
        if ($request->status) {
            $lead->update(['status' => $request->status]);
        }
        
        return redirect()->back()->with('success', 'Remark added successfully.');
    }
}