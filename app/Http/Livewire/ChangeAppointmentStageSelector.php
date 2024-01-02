<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Notifications\UserAppointmentStageNotification;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangeAppointmentStageSelector extends Component
{
    public $appointmentId;

    public $selectedStage;

    public $appointment;

    public $password;

    public function mount($appointmentId)
    {
        $this->$appointmentId = $appointmentId;
        $this->appointment = Appointment::where('uuid', $this->$appointmentId)->first();
        $this->selectedStage = $this->appointment->status;
    }

    public function render()
    {
        return view('livewire.change-appointment-stage-selector');
    }

    public function updatedSelectedStage()
    {
        if ($this->selectedStage !== $this->appointment->status) {
            $this->password = null;
        }
    }

    public function updateAppointmentStage()
    {
        if (Hash::check($this->password, auth()->user()->password)) {
            $this->appointment->update([
                'status' => $this->selectedStage,
            ]);

            toastr()->addSuccess('Appointment Stage updated successfully.');
            $this->appointment->user->notify(new UserAppointmentStageNotification($this->appointment->user, $this->appointment));

            return redirect()->route(role(auth()->user()->role_id).'.appointments.show', $this->appointment->id);
        }

        toastr()->addError('Incorrect Password');

        return redirect()->route(role(auth()->user()->role_id).'.appointments.show', $this->appointment->id);

    }
}
