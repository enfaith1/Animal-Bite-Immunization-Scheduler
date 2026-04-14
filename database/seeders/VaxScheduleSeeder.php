<?php

namespace Database\Seeders;

use App\Models\VaxSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaxScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VaxSchedule::factory()->count(30)->create();
    }
}
