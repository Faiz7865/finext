<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Client;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('invoice_number', 'like', '%' . $request->search . '%')
                  ->orWhere('bill_to_name', 'like', '%' . $request->search . '%');
            });
        }

        $invoices = $query->latest()->paginate(20);

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $items = Item::orderBy('name')->get();
        return view('admin.invoices.create', compact('clients', 'items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'nullable|exists:clients,id',
            'invoice_number' => 'required|unique:invoices',
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'payment_terms' => 'nullable|string',
            'bill_to_name' => 'required|string',
            'bill_to_address' => 'nullable|string',
            'ship_to_active' => 'boolean',
            'ship_to_name' => 'nullable|string',
            'ship_to_address' => 'nullable|string',
            'subtotal' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'total' => 'required|numeric',
            'amount_paid' => 'nullable|numeric',
            'payment_method' => 'nullable|string',
            'transaction_id' => 'nullable|string',
            'notes' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'company_address' => 'nullable|string',
            'gst_active' => 'boolean',
            'gst_number' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'signature' => 'nullable|image|max:2048',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string',
            'items.*.hsn_sac_code' => 'nullable|string',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.rate' => 'required|numeric|min:0',
            'items.*.amount' => 'required|numeric|min:0',
            'total_in_words' => 'nullable|string',
            'discount_amount' => 'nullable|numeric|min:0',
            'taxable_amount' => 'nullable|numeric|min:0',
            'cgst_rate' => 'nullable|numeric|min:0|max:100',
            'cgst_amount' => 'nullable|numeric|min:0',
            'sgst_rate' => 'nullable|numeric|min:0|max:100',
            'sgst_amount' => 'nullable|numeric|min:0',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('invoices/logos', 'public');
        }

        if ($request->hasFile('signature')) {
            $validated['signature_path'] = $request->file('signature')->store('invoices/signatures', 'public');
        }

        $invoice = Invoice::create($validated);

        foreach ($request->items as $item) {
            $invoice->items()->create($item);
        }

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('items');
        return view('admin.invoices.show', compact('invoice'));
    }

    public function downloadPdf(Invoice $invoice)
    {
        $invoice->load('items');
        // Using the wrapper directly to avoid facade issues in some environments
        $pdf = app('dompdf.wrapper')->loadView('admin.invoices.pdf', compact('invoice'));
        return $pdf->download("Invoice-{$invoice->invoice_number}.pdf");
    }

    public function edit(Invoice $invoice)
    {
        $clients = Client::orderBy('name')->get();
        $items = Item::orderBy('name')->get();
        $invoice->load('items');
        return view('admin.invoices.edit', compact('invoice', 'clients', 'items'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'client_id' => 'nullable|exists:clients,id',
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoice->id,
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'payment_terms' => 'nullable|string',
            'bill_to_name' => 'required|string',
            'bill_to_address' => 'nullable|string',
            'ship_to_active' => 'boolean',
            'ship_to_name' => 'nullable|string',
            'ship_to_address' => 'nullable|string',
            'subtotal' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'total' => 'required|numeric',
            'amount_paid' => 'nullable|numeric',
            'payment_method' => 'nullable|string',
            'transaction_id' => 'nullable|string',
            'notes' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'company_address' => 'nullable|string',
            'gst_active' => 'boolean',
            'gst_number' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
            'signature' => 'nullable|image|max:2048',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string',
            'items.*.hsn_sac_code' => 'nullable|string',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.rate' => 'required|numeric|min:0',
            'items.*.amount' => 'required|numeric|min:0',
            'total_in_words' => 'nullable|string',
            'discount_amount' => 'nullable|numeric|min:0',
            'taxable_amount' => 'nullable|numeric|min:0',
            'cgst_rate' => 'nullable|numeric|min:0|max:100',
            'cgst_amount' => 'nullable|numeric|min:0',
            'sgst_rate' => 'nullable|numeric|min:0|max:100',
            'sgst_amount' => 'nullable|numeric|min:0',
        ]);

        if ($request->hasFile('logo')) {
            if ($invoice->logo_path) {
                Storage::delete('public/' . $invoice->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('invoices/logos', 'public');
        }

        if ($request->hasFile('signature')) {
            if ($invoice->signature_path) {
                Storage::delete('public/' . $invoice->signature_path);
            }
            $validated['signature_path'] = $request->file('signature')->store('invoices/signatures', 'public');
        }

        $invoice->update($validated);

        // Update items: delete old ones and recreate
        $invoice->items()->delete();
        foreach ($request->items as $item) {
            $invoice->items()->create($item);
        }

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        if ($invoice->logo_path) {
            Storage::delete('public/' . $invoice->logo_path);
        }
        if ($invoice->signature_path) {
            Storage::delete('public/' . $invoice->signature_path);
        }
        $invoice->delete();
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
