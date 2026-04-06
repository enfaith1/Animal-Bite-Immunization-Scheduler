<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VaxBrand;

class VaxBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands= [
            ['brand_name' => 'Abhayrab', 'type' => 'PVRV'],
            ['brand_name' => 'ChiroRab', 'type' => 'PCEC'],
            ['brand_name' => 'VaxiRab', 'type' => 'PCEC'],
            ['brand_name' => 'Verorab', 'type' => 'PVRV'],
            ['brand_name' => 'Speeda', 'type' => 'PVRV']
        ];

        foreach ($brands as $brand) {
            VaxBrand::factory()->create($brand);
        }
    }
}
