<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->integer('age');
            $table->string('gender');
            $table->string('address');
            $table->date('bite_date');
            $table->string('animal_type'); // dog, cat, bat, etc.
            $table->date('first_dose_date')->nullable();
            $table->date('second_dose_date')->nullable();
            $table->date('third_dose_date')->nullable();
            $table->string('status')->default('pending'); // pending, completed, missed
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
