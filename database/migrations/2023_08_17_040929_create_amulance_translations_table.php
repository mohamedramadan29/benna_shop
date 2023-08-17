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
        Schema::create('amulance_translations', function (Blueprint $table) {
            $table->id(); 
            $table->string('locale')->index();
            $table->string('driver_name');
            $table->text('note')->nullable();
            $table->unique(['amulance_id','locale','driver_name']);
            $table->foreignId('amulance_id')->references('id')->on('amulances')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amulance_translations');
    }
};
