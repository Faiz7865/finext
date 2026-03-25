<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            
            // Billing Details
            $table->string('bill_to_name');
            $table->text('bill_to_address')->nullable();
            
            // Shipping Details
            $table->boolean('ship_to_active')->default(false);
            $table->string('ship_to_name')->nullable();
            $table->text('ship_to_address')->nullable();
            
            // Items Totals
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('tax', 15, 2)->default(0);
            $table->decimal('total', 15, 2)->default(0);
            $table->decimal('amount_paid', 15, 2)->default(0);
            $table->decimal('balance_due', 15, 2)->default(0);
            
            // Payment Details
            $table->string('payment_method')->nullable(); // UPI, NEFT, Net Banking
            $table->string('transaction_id')->nullable();
            
            // Branding & Signature
            $table->string('logo_path')->nullable();
            $table->string('signature_path')->nullable();
            
            // Other Info
            $table->text('notes')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->string('status')->default('pending'); // pending, partially_paid, paid, cancelled
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
