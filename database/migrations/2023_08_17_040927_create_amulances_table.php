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
        Schema::create('amulances', function (Blueprint $table) {
            $table->id();
            $table->string('car_number');
            $table->string('car_model');
            $table->string('car_year_made');
            $table->string('drive_licence_number');
            $table->string('drive_phone');
            $table->boolean('is_available')->default(1);
            $table->string('car_type')->default('ملك');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amulances');
    }
};
