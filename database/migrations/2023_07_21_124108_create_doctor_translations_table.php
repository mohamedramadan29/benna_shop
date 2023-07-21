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
        Schema::create('doctortranslations', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('doctor_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->string('appointment');
            $table->unique(['doctor_id','locale']);
            $table->foreign('doctor_id')->references('id')->on('doctors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_translations');
    }
};
