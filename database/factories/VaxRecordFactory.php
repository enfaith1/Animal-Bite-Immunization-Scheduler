<?php

namespace Database\Factories;

use App\Models\VaxRecord;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VaxRecord>
 */
class VaxRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_of_exposure' => fake()->date(),
            'date_of_visit' => fake()->date(),
            'place_of_exposure' => fake()->city(),
            'exposure_type' => fake()->randomElement(['bite', 'scratch', 'lick']),
            'animal_type' => fake()->randomElement(['cat', 'dog', 'bat', 'other']),
            'animal_condition' => fake()->randomElement(['Healthy', 'Sick', 'Lost', 'Dead']),
            'exposure_category' => fake()->randomElement(['I', 'II', 'III']),
            'remarks' => fake()->sentence(),
            'patient_id' => Patient::inRandomOrder()->first()->id
        ];
    }
}
