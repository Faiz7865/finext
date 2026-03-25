<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_date' => 'required|date',
            'payment_method' => 'nullable|string',
            'transaction_id' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $payment = $invoice->payments()->create($validated);

        // Update invoice amount_paid
        $invoice->amount_paid += $payment->amount;
        $invoice->save(); // The boot method in Invoice will recalculate balance_due and status

        return back()->with('success', 'Payment recorded successfully.');
    }

    public function receipt(Payment $payment)
    {
        $payment->load('invoice.client');
        $pdf = app('dompdf.wrapper')->loadView('admin.payments.receipt', compact('payment'));
        return $pdf->download("Receipt-{$payment->transaction_id}-{$payment->id}.pdf");
    }
}
