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
        for ($i = 0; $i < 10 ; $i++) {
            Appointment::create([
                'appointment_date' => fake()
                    ->dateTimeBetween(
                        now()->addDay()->format('Y-m-d 09:00:00'),
                        now()->addDay()->format('Y-m-d 16:00:00')
                    ),
                'user_id' => User::find(1)->id,
                'patient_id'  => User::query()->whereNot('id' , 1)->inRandomOrder()->first()->id
            ]);
       }
    }
}
