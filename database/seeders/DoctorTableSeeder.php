<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        doctor::factory(20)->create();
        $appoiments = Appointment::all();
        doctor::all()->each(function($doctor) use ($appoiments){
            $doctor->docotorappoiments()->attach(
                $appoiments->random(rand(1,7))->pluck('id')->toArray()
            );
        });
    }
}
