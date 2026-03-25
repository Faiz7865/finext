<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = [
        'client_id',
        'invoice_number',
        'invoice_date',
        'due_date',
        'payment_terms',
        'bill_to_name',
        'bill_to_address',
        'ship_to_active',
        'ship_to_name',
        'ship_to_address',
        'subtotal',
        'tax',
        'total',
        'amount_paid',
        'balance_due',
        'payment_method',
        'transaction_id',
        'logo_path',
        'signature_path',
        'notes',
        'terms_conditions',
        'total_in_words',
        'status',
        'company_address',
        'gst_active',
        'gst_number',
        'discount_percentage',
        'discount_amount',
        'taxable_amount',
        'cgst_rate',
        'cgst_amount',
        'sgst_rate',
        'sgst_amount',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'due_date' => 'date',
        'ship_to_active' => 'boolean',
        'gst_active' => 'boolean',
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'amount_paid' => 'decimal:2',
        'balance_due' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'taxable_amount' => 'decimal:2',
        'cgst_rate' => 'decimal:2',
        'cgst_amount' => 'decimal:2',
        'sgst_rate' => 'decimal:2',
        'sgst_amount' => 'decimal:2',
    ];

    /**
     * Get the client for the invoice.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the payments for the invoice.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the items for the invoice.
     */
    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    /**
     * Boot function to handle automatic balance calculation.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($invoice) {
            $invoice->balance_due = $invoice->total - $invoice->amount_paid;
            
            if ($invoice->balance_due <= 0) {
                $invoice->status = 'paid';
            } elseif ($invoice->amount_paid > 0) {
                $invoice->status = 'partially_paid';
            } else {
                $invoice->status = 'pending';
            }
        });
    }
}
