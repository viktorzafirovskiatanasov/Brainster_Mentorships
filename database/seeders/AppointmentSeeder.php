<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $periods = CarbonPeriod::create(   now()->addDay()->format('Y-m-d 09:00:00'),
            '1 hour',
            now()->addDay()->format('Y-m-d 16:00:00')
        )->toArray();

        for ($i = 0; $i < 5; $i++) {
            Appointment::create([
                'appointment_date' => $periods[array_rand($periods)],
                'user_id' => User::find(1)->id,
                'patient_id'  => User::query()->whereNot('id' , 1)->inRandomOrder()->first()->id
            ]);
       }
    }
}
