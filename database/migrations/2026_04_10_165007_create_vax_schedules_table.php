<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vax_schedules', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->unsignedBigInteger('vax_rec_id');
            $table->enum('dose_day', ['Day 0', 'Day 3', 'Day 7', 'Day 14', 'Day 28']);
            $table->date('scheduled_date');
            $table->enum('status', ['pending', 'completed', 'missed'])->default('pending');
            $table->date('administered_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->foreign('vax_rec_id')->references('vax_rec_id')->on('vax_records')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vax_schedules');
    }
};