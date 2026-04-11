<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->integer('age');
            $table->string('gender');
            $table->text('address');
            $table->date('bite_date');
            $table->string('animal_type');
            $table->date('first_dose_date')->nullable();
            $table->date('second_dose_date')->nullable();
            $table->date('third_dose_date')->nullable();
            $table->string('status')->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};