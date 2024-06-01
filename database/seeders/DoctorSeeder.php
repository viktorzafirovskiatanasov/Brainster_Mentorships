<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'doctor',
            'email' => 'doctor@mojtermin.com',
            'phone' => fake()->phoneNumber(), // 123-312-123
            'type' => 'doctor',
            'password' => Hash::make('password')
        ]);
    }
}
