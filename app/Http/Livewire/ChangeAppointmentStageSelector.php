<?php

namespace App\Http\Livewire;

use App\Constants\StageTypes;
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

    public $showPasswordField = false; // Add a property to control visibility

    public $showPasswordModal = false; // Add a property to control visibility

    public function mount($appointmentId)
    {
        $this->appointmentId = $appointmentId;
        $this->appointment = Appointment::where('uuid', $this->appointmentId)->first();
        $this->selectedStage = $this->appointment->stage_id;
    }

    public function render()
    {
        return view('livewire.change-appointment-stage-selector');
    }

    public function updateSelectedStage()
    {
        $this->dispatch('toggle-password-modal', $this->selectedStage !== $this->appointment->stage_id);

    }

    public function updateAppointmentStage()
    {
        if (!Hash::check($this->password, auth()->user()->password)) {
            toastr()->timeOut(10000)->addError('Incorrect Password');

            return redirect()->route(role(auth()->user()->role_id) . '.appointments.show', $this->appointment->id);
        }
        
        $this->appointment->update([
            'stage_id' => $this->selectedStage,
            'end_time' => $this->selectedStage == StageTypes::COMPLETED->value ? now() : null
        ]);

        toastr()->timeOut(10000)->addSuccess('Appointment Stage updated successfully.');
        $this->appointment->user->notify(new UserAppointmentStageNotification($this->appointment->user, $this->appointment));

        return redirect()->route(role(auth()->user()->role_id).'.appointments.show', $this->appointment->id);

        
    }
}
