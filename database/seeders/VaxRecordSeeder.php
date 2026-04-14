<?php

namespace Database\Seeders;

use App\Models\VaxRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaxRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VaxRecord::factory()->count(30)->create();
    }
}
