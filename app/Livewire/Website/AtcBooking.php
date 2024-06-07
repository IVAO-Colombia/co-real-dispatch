<?php

namespace App\Livewire\Website;

use App\Enums\AtcBookingStatus;
use App\Models\AtcBooking as ModelsAtcBooking;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app')]
class AtcBooking extends Component
{
    public $facilitys,
        $facilitysIvao,
        $facilitybooks,
        $bookingTimes,
        $bookings;

    public $dependence, $start_at, $end_at;
    public $modal = false;


    public function render()
    {
        $this->facilitys = Bookingfacilitys();
        $this->bookingTimes = bookingTimes();
        $this->facilitysIvao = facilitysIvaoController();

        foreach ($this->facilitys as $key => $value) {
            $item = (object) $value;
            $this->bookings = $this->getActualBookings($item->name);

            if ($this->bookings) {
                $itemBookingTimes = $this->bookingTimes;

                for ($i = 0; $i < count($this->bookings); $i++) {
                    for ($j = 0; $j < count($itemBookingTimes); $j++) {
                        if (
                            ($this->bookings[$i]->status == \App\Enums\AtcBookingStatus::Pending->value &&
                                Auth::user() &&
                                Auth::user()->id == $this->bookings[$i]->user_id &&
                                $this->bookings[$i]->start_at == $itemBookingTimes[$j]["start_at"] &&
                                $this->bookings[$i]->end_at == $itemBookingTimes[$j]["end_at"] &&
                                $this->bookings[$i]->dependence == $item->name)
                            ||
                            ($this->bookings[$i]->status == \App\Enums\AtcBookingStatus::Booked->value &&
                                $this->bookings[$i]->start_at == $itemBookingTimes[$j]["start_at"] &&
                                $this->bookings[$i]->end_at == $itemBookingTimes[$j]["end_at"] &&
                                $this->bookings[$i]->dependence == $item->name)
                        ) {
                            // Asignar el user_id al resultado que cumpla con las condiciones
                            $itemBookingTimes[$j]["user_id"] = $this->bookings[$i]->user_id;
                            $itemBookingTimes[$j]["status"] = AtcBookingStatus::from($this->bookings[$i]->status);
                            $itemBookingTimes[$j]["booking"] = (object) $this->bookings[$i];
                        }
                    }
                }
                $item->times = $itemBookingTimes;
            } else {
                $item->times = $this->bookingTimes;
            }
            $this->facilitybooks[$key] = $item;
        }
        // dd($this->facilitybooks);


        return view('livewire.website.atc-booking', [
            "bookings" => $this->facilitybooks,
        ]);
    }



    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->resetExcept("search");
        $this->modal = false;
    }

    public function showConfirm($dependence, $start_at, $end_at)
    {
        $this->dependence = $dependence;
        $this->start_at = $start_at;
        $this->end_at = $end_at;

        $this->openModal();
    }

    public function save()
    {
        $booking = new ModelsAtcBooking();

        $booking->dependence = $this->dependence;
        $booking->start_at = $this->start_at;
        $booking->end_at = $this->end_at;
        $booking->user_id = Auth::user()->id;

        $booking->save();

        session()->flash("message", "Solicitud exitosa en $this->dependence, a las $this->start_at (Esta no es una confirmación, unicamente una solicitud)");
        $this->closeModal();
        $this->resetExcept("search");
    }

    public function getActualBookings($dependence)
    {
        return ModelsAtcBooking::where('dependence', $dependence)
            ->where('status', AtcBookingStatus::Pending)
            ->orWhere('status', AtcBookingStatus::Booked)
            ->get();
    }
}
