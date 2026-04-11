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
        Schema::create('vax_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vax_record_id')->constrained()->onDelete('cascade');
            $table->foreignId('vax_brand_id')->constrained()->onDelete('cascade');
            $table->enum('dose_day', ['0', '3', '7', '14', '28']);
            $table->date('scheduled_date');
            $table->date('actual_date')->nullable();
            $table->enum('status', ['Completed', 'Upcoming', 'Missed'])->default('Upcoming');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vax_schedules');
    }
};
