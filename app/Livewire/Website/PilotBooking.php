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


    public $airports = [];

    public function mount()
    {
        $this->user = Auth::user();

        $this->airports = [
            "SKBO" => [
                "airlines" => [
                    "Avianca" => [
                        "aircrafts" => ["A320", "A319"],
                    ],
                    "Wingo" => [
                        "aircrafts" => ["B738"],
                    ],
                    "Latam" => [
                        "aircrafts" => ["A320"],
                    ],
                    "Clic" => [
                        "aircrafts" => ["AT42", "AT72"],
                    ],
                ],
                "name" => "Aeropuerto Internacional El Dorado",
                "oaci" => "SKBO"
            ],
            "SKRG" => [
                "airlines" => [
                    "Avianca" => [
                        "aircrafts" => ["A320", "A319"],
                    ],
                    "Wingo" => [
                        "aircrafts" => ["B738"],
                    ],
                    "Latam" => [
                        "aircrafts" => ["A320"],
                    ]
                ],
                "name" => "Aeropuerto Internacional José María Córdova",
                "oaci" => "SKRG"
            ],
            "SKBQ" => [
                "airlines" => [
                    "Avianca" => [
                        "aircrafts" => ["A320", "A319"],
                    ],
                    "Wingo" => [
                        "aircrafts" => ["B738"],
                    ],
                    "Latam" => [
                        "aircrafts" => ["A320"],
                    ],
                    "Clic" => [
                        "aircrafts" => ["AT42", "AT72"],
                    ],
                ],
                "name" => "Aeropuerto Internacional Ernesto Cortissoz",
                "oaci" => "SKBQ"
            ],
        ];
    }

    public function render()
    {
        return view('livewire.website.book');
    }

    public function selectAirline($hub)
    {
        $this->hub = $hub;
        $airlines = (object) $this->airports[$hub];

        $this->hubScreen = false;
        $this->airlineScreen = true;
    }

    public function store()
    {

        $booking = new ModelsPilotBooking();

        $booking->airline = $this->airline;
        $booking->aircraft = $this->aircraft;
        $booking->hub = $this->hub;
        $booking->user_id = $this->user->id;

        $booking->save();
    }
}
