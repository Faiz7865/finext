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
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('discount_percentage', 5, 2)->default(0)->after('subtotal');
            $table->decimal('discount_amount', 15, 2)->default(0)->after('discount_percentage');
            $table->decimal('taxable_amount', 15, 2)->default(0)->after('discount_amount');
            $table->decimal('cgst_rate', 5, 2)->default(0)->after('taxable_amount');
            $table->decimal('cgst_amount', 15, 2)->default(0)->after('cgst_rate');
            $table->decimal('sgst_rate', 5, 2)->default(0)->after('cgst_amount');
            $table->decimal('sgst_amount', 15, 2)->default(0)->after('sgst_rate');
        });

        Schema::table('invoice_items', function (Blueprint $table) {
            $table->string('hsn_sac_code')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn([
                'discount_percentage',
                'discount_amount',
                'taxable_amount',
                'cgst_rate',
                'cgst_amount',
                'sgst_rate',
                'sgst_amount'
            ]);
        });

        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn('hsn_sac_code');
        });
    }
};
