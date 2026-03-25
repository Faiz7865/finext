<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(20);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        Client::create($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.create', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'company_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        $client->update($validated);
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }

    public function statement(Client $client)
    {
        $invoices = $client->invoices()->with('payments')->get();
        return view('admin.clients.statement', compact('client', 'invoices'));
    }

    public function statementPdf(Client $client)
    {
        $invoices = $client->invoices()->with('payments')->orderBy('invoice_date', 'asc')->get();
        // Setup initial default image if you need logo (we can just use FINEXT SOLUTION text for now or logo if exist)
        $pdf = Pdf::loadView('admin.clients.statement_pdf', compact('client', 'invoices'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream('Statement-' . $client->name . '.pdf');
    }
}
