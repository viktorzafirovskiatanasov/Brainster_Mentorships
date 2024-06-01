<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(3)
            ->create();
//            ->has(Appointment::factory()->count(3)
//            ->state(function (array $attributes, User $user) {
//                return ['user_id' => 1];
//            }), 'pacient_appointments')
//            ->create();
    }
}
