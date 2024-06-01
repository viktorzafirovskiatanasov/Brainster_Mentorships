<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(100)
//             ->has(Appointment::factory(10) , 'appointments')
//             ->create();

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
//
        $this->call([
            DoctorSeeder::class,
            UserSeeder::class,
            AppointmentSeeder::class
        ]);
    }
}
