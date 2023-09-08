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
        Schema::create('recipt_accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('patient_id')->references('id')->on('patients')->cascadeOnDelete();
            $table->decimal('debit','8','2');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipt_accounts');
    }
};
