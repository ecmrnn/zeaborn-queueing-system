<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $status = '';

    public function checkAppointment($id)
    {
        $appointment = Appointment::find($id);

        if ($appointment->user_id !== Auth::user()->id) {
            return session()->flash('error', 'no!');
        }

        $appointment->status = 'done';

        $appointment->save();

        session()->flash('success', 'Appointment Done');
    }

    public function viewPendingAppointment($id)
    {
    }

    // Update the status of the user
    public function updateStatus()
    {
        $user = User::find(Auth::user()->id);
        if ($user->status == 'active') {
            $user->status = 'inactive';
            $this->status = 'inactive';
        } else {
            $user->status = 'active';
            $this->status = 'active';
        }

        $user->save();
        return $this->redirect('dashboard', navigate: true);
    }

    public function render()
    {
        $user = Auth::user();
        $this->status = $user->status;

        // Retrieve all appoinments of the user
        $appointments = Appointment::all()->where('user_id', $user->id);

        // Retrieve collection of pending appointments
        $pending = Appointment::all()
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->sortBy('appointment_time');

        // Retrieve count of done appointments
        $done = Appointment::all()
            ->where('user_id', $user->id)
            ->where('status', 'done')
            ->count();

        return view('livewire.dashboard', [
            'appointments' => $appointments,
            'pending' => $pending,
            'done' => $done,
        ]);
    }
}
