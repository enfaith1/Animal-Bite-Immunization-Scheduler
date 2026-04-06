<?php

namespace Database\Factories;

use App\Models\VaxBrand;
use App\Models\VaxRecord;
use App\Models\VaxSchedule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VaxSchedule>
 */
class VaxScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vax_record_id' => VaxRecord::inRandomOrder()->first()->id,
            'vax_brand_id' => VaxBrand::inRandomOrder()->first()->id,
            'dose_day' => fake()->randomElement(['3', '7', '14', '28']),
            'scheduled_date' => fake()->date(),
            'actual_date' => fake()->date(),
            'status'=> fake()->randomElement(['Completed', 'Upcoming', 'Missed'])
        ];
    }
}
