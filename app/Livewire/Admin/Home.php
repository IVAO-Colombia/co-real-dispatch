<?php

namespace App\Livewire\Admin;

use App\Helpers\Bookings;
use App\Models\AtcBooking;
use App\Models\PilotBooking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Home extends Component
{

    public $user = "", $pilotBookings, $atcBookings;
    /**
     * PENDIENTES:
     *      - Tabla estadisticas
     */
    public function render()
    {
        $this->user = Auth::user();
        $this->pilotBookings = PilotBooking::all();
        $this->atcBookings = AtcBooking::all();


        $userBooking = PilotBooking::where('user_id', $this->user->id)->first();
        $cPilotBookings = PilotBooking::all()->count();
        $cAtcBookings = AtcBooking::all()->count();
        $mostAirpot = "XXXX";

        // Render
        return view('dashboard', [
            "userBooking" => $userBooking,
            "countPilotBookings" => $cPilotBookings,
            "countAtcBookings" => $cAtcBookings,
            "principalHub" => Bookings::getPrincipalHub()
        ]);
    }
}
