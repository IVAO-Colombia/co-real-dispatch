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
    public $modal = false;

    public $aircraft, $hub, $airline;
    public $airlines = [];

    public function mount()
    {
        $this->user = Auth::user();

        $this->airlines = [
            "avianca" => [
                "hub" => ["SKBO", "SKRG", "SKBQ"],
                "aircraft" => ["A320", "A319"],
                "name" => "Avianca"
            ],
            "latam" => [
                "hub" => ["SKBO", "SKRG", "SKBQ"],
                "aircraft" => ["A320", "A319"],
                "name" => "Latam"
            ],
            "wingo" => [
                "hub" => ["SKBO", "SKRG", "SKBQ"],
                "aircraft" => ["B738"],
                "name" => "Wingo"
            ],
            "clic" => [
                "hub" => ["SKBO", "SKBQ"],
                "aircraft" => ["ATR42", "ATR72"],
                "name" => "Wingo"
            ],
        ];
    }

    public function render()
    {
        return view('livewire.website.book');
    }

    public function showModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function booking($hub)
    {
        $this->hub = $hub;
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
