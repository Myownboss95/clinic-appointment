<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FollowUpAppointmentSeeder extends Seeder
{
    public function run()
    {
        $rootAppointments = Appointment::limit(50)->get();
        foreach ($rootAppointments as $rootAppointment) {
            Appointment::create([
                'user_id' => $rootAppointment->user_id,
                'parent_appointment_id' => $rootAppointment->id,
                'start_time' => Carbon::now()->addHours(1),
            ]);
        }

    }
}
