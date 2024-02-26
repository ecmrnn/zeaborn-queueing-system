<?php

namespace App\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateAppointment extends Component
{
    // Boolean flags for select tags
    public $isOtherRankChecked = false;
    public $isOtherStaffChecked = false;
    public $isOtherPurposeChecked = false;

    // Personal Information
    #[Validate('required')]
    public $firstName = '';
    #[Validate('required')]
    public $lastName = '';
    #[Validate('required')]
    public $rank = '';
    #[Validate('required')]
    public $vessel = '';

    // Appointment Information
    #[Validate('required')]
    public $appointmentTime = '';
    #[Validate('required')]
    public $reportingStaff = '';
    #[Validate('required')]
    public $purpose = '';

    public function save(Request $request)
    {
        // $this->validate();

        Appointment::create([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'rank' => $this->rank,
            'vessel' => $this->vessel,
            'appointmentTime' => $this->appointmentTime,
            'reportingStaff' => $this->reportingStaff,
            'purpose' => $this->purpose,
        ]);

        $this->reset();
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.appointments.create-appointment', [
            'users' => $users,
        ]);
    }
}
