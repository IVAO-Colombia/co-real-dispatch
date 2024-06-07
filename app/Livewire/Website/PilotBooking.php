<?php

namespace App\Livewire\Website;

use App\Models\PilotBooking as ModelsPilotBooking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('app')]
class PilotBooking extends Component
{
    public $user;

    // To dataa
    public $aircraft, $hub, $airline;

    // Screens status
    public $hubScreen = true,
        $airlineScreen = false,
        $aircraftScreen = false;
    public $modal = false;
    public $airports;

    public function mount()
    {
        $this->user = Auth::user();

        $this->airports = airportBookings();
    }

    public function render()
    {
        // dd($this->airports->SKBO["airlines"]);
        return view('livewire.website.book');
    }

    public function closeModal()
    {
        // $this->resetExcept("search");
        $this->modal = false;
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function selectAirline($hub)
    {
        $this->hub = $hub;

        $this->hubScreen = false;
        $this->airlineScreen = true;
    }

    public function selectAircraft($airline)
    {
        $this->airline = $airline;

        $this->hubScreen = false;
        $this->airlineScreen = false;
        $this->aircraftScreen = true;
    }

    public function confirmBooking($aircraft)
    {
        $this->aircraft = $aircraft;

        $this->hubScreen = false;
        $this->airlineScreen = false;
        $this->aircraftScreen = true;
        $this->openModal();
    }



    public function save()
    {
        $othersBookings = ModelsPilotBooking::where('user_id', $this->user->id)->first();

        if (!isset($othersBookings)) {
            $booking = new ModelsPilotBooking();

            $booking->airline = $this->airline;
            $booking->aircraft = $this->aircraft;
            $booking->hub = $this->hub;
            $booking->user_id = $this->user->id;

            $booking->save();
            $this->closeModal();
            return session()->flash('message', "La reserva #$booking->id con HUB en $booking->hub fue exitosa... Recuerde unirse discord mediante discord.co.ivao.aero");
        } else {
            return session()->flash('error', "Ya cuenta con una reserva activa");
        }
    }
}
