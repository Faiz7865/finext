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
            $table->text('company_address')->nullable()->after('bill_to_address');
            $table->boolean('gst_active')->default(false)->after('company_address');
            $table->string('gst_number')->nullable()->after('gst_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['company_address', 'gst_active', 'gst_number']);
        });
    }
};
