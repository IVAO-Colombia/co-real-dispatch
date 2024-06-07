<?php

namespace App\Livewire\Admin;

use App\Models\PilotBooking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class PilotBookingView extends Component
{
    public $user,
        $booking,
        $countHub,
        $facilitysIvao;

    public $airports;
    public function mount()
    {
        $this->airports = airportBookings();
        $this->facilitysIvao = facilitysIvaoPilot();
        $this->user = Auth::user();
        //
        $this->booking = PilotBooking::where('user_id', $this->user->id)->first();
        if (isset($this->booking)) {
            $this->countHub = PilotBooking::where('hub', $this->booking->hub)->count();
        } else {
            $this->redirectRoute('book.pilot');
        }
    }
    public function render()
    {
        return view(
            'livewire.admin.pilot-booking-view',
            ["booking" => $this->booking]
        );
    }

    public function delete($id)
    {
        PilotBooking::findOrFail($id)->delete();
        return session()->flash("message", "Se ha eliminado la reserva correctamente");
    }
}
