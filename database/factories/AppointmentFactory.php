<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appointment_date' => fake()
                ->dateTimeBetween(
                    now()->addDay()->format('Y-m-d 09:00:00'),
                    now()->addDay()->format('Y-m-d 16:00:00')
                )
        ];
    }
}
