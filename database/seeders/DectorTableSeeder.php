<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Dector;
use Database\Factories\DectorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $doctors =  Dector::factory()->count(30)->create();
       $Appointments = Appointment::all();

       ////        foreach ($doctors as $doctor){
       ////            $Appointments = Appointment::all()->random()->id;
       ////            $doctor->doctorappointments()->attach($Appointments);
       ////        }

       
       Dector::all()->each(function ($doctor) use ($Appointments) {
        $doctor->doctorappointments()->attach(
            $Appointments->random(rand(1,7))->pluck('id')->toArray()
        );
    });
    }
}
