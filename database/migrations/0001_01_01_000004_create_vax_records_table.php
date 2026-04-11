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
        Schema::create('vax_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->date('date_of_exposure');
            $table->date('date_of_visit');
            $table->string('place_of_exposure')->nullable();
            $table->string('exposure_type'); //no need for enum, typed by user
            $table->string('animal_type');
            $table->enum('animal_condition', ['Healthy', 'Sick', 'Lost', 'Dead']);
            $table->enum('exposure_category', ['I', 'II', 'III']);
            $table->string('rig_brand')->nullable(); //optional immunization
            $table->string('tetanus_brand')->nullable(); //optional immunization
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vax_records');
    }
};
