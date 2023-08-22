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
        Schema::create('single_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_date');
            $table->foreignId('patient_id')->references('id')->on('patients')->cascadeOnDelete();
            $table->foreignId('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->foreignId('service_id')->references('id')->on('services')->cascadeOnDelete();
            $table->decimal('price','8','2');
            $table->double('discount_value','8','2');
            $table->string('tax_rate');
            $table->string('tax_value');
            $table->decimal('total_with_tax','8','2');
            $table->integer('type')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_invoices');
    }
};
