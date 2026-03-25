<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lead_remarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('remark');
            $table->enum('status', ['pending', 'contacted', 'converted', 'lost', 'follow_up'])->nullable();
            $table->timestamp('follow_up_time')->nullable();
            $table->timestamps();
            
            // Indexes
            $table->index('lead_id');
            $table->index('user_id');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lead_remarks');
    }
};