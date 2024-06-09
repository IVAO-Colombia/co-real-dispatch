<?php

namespace App\Livewire\Admin;

use App\Enums\AtcBookingStatus;
use App\Models\AtcBooking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class AtcBookingView extends Component
{
    public $user,
        $bookings;

    public function mount()
    {
        $this->user = Auth::user();
        $this->bookings = AtcBooking::where('user_id', $this->user->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.atc-booking-view', [
            "bookings" => $this->bookings
        ]);
    }

    public function delete($id)
    {
        $booking = AtcBooking::findOrFail($id)->delete();
        return session()->flash("message", "Successfully delete booking");
    }
}
