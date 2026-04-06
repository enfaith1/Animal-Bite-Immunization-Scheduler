<?php

namespace Database\Factories;

use App\Models\VaxBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VaxBrand>
 */
class VaxBrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Default values to be overidden by seeder
        return [
            'brand_name' => 'Abhayrab',
            'type'=> 'PVRV'
        ];
    }
}
