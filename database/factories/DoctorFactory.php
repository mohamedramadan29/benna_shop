<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'appointment' => $this->faker->randomElement(['sunday', 'monday', 'thursday', 'tuseday', 'friday']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => rand(5, 10),
            'phone' => $this->faker->phoneNumber(),
            'price' => $this->faker->randomElement([100, 200, 300, 400, 500]),
            'section_id' => Section::all()->random()->id
        ];
    }
}
