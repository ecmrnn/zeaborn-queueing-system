<?php

namespace App\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateAppointment extends Component
{
    // Boolean flags for select tags
    public $isOtherRankChecked = false;
    public $isOtherStaffChecked = false;
    public $isOtherPurposeChecked = false;

    // Personal Information
    #[Rule('required|min:2')]
    public $firstName = '';
    #[Rule('required|min:2')]
    public $lastName = '';
    #[Rule('required')]
    public $rank = '';
    #[Rule('required')]
    public $vessel = '';

    // Appointment Information
    #[Rule('required')]
    public $appointmentTime;
    #[Rule('required')]
    public $reportingStaff = '';
    #[Rule('required')]
    public $purpose = '';
    #[Rule('min:2')]
    public $otherStaff = '';

    public function save()
    {
        if ($this->reportingStaff == '' || $this->otherStaff !== '') {
            $reception = User::all()->where('first_name', 'reception')->first();
            if ($reception == null) {
                $this->reset();
                session()->flash('error', 'Walang reception!');
                return;
            } else {
                $this->reportingStaff = $reception->id;
            }
        }

        $this->attributes['appointmentTime'] = Carbon::parse($this->appointmentTime);

        $this->validate();

        Appointment::create([
            'user_id' => $this->reportingStaff,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'rank' => $this->rank,
            'vessel' => $this->vessel,
            'appointment_time' => $this->appointmentTime,
            'purpose' => $this->purpose,
            'other_staff' => $this->otherStaff,
        ]);

        $this->reset();

        session()->flash('success', 'Appointment sent!');
    }

    #[Layout('components.layouts.guest')]
    public function render()
    {
        $users = User::all()->sortBy('first_name');
        return view('livewire.appointments.create-appointment', [
            'users' => $users,
        ]);
    }
}
