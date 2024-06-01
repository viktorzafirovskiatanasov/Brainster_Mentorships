<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//dd(User::query()->whereNot('type' , 'doctor')->inRandomOrder()->first()->toSql());
        for ($i = 0; $i < 10; $i++) {
            Appointment::query()->create([
                'user_id' => User::query()->first()->id,
                'patient_id' => User::query()->inRandomOrder()->whereNot('type' , 'doctor')->first()->id,
                'appointment_date' => fake()->dateTimeBetween(
                    now()->addDay()->setTime(9 , 0),
                    now()->addDay()->setTime(16 , 0),
                )
            ]);
        }

    }
}
