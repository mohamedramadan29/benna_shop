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
        Schema::create('fund_acounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('single_invoice_id')->nullable()->references('id')->on('single_invoices')->cascadeOnDelete();
            $table->foreignId('recipt_id')->nullable()->references('id')->on('recipt_accounts')->cascadeOnDelete();
            $table->decimal('debit','8','2')->nullable(); // مدين 
            $table->decimal('credit','8','2')->nullable(); // داين 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fund_acounts');
    }
};
