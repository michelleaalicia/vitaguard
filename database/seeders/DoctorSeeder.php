<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = User::where('role', 'doctor')->first();

        Doctor::updateOrCreate(
            ['user_id' => $doctor->id],
            [
                'specialization' => 'General Practitioner',
                'phone' => '081234567890',
                'photo' => null,
                'description' => 'Experienced general practitioner.',
                'schedule' => 'Monday - Friday, 08:00 - 16:00',
            ]
        );
    }
}