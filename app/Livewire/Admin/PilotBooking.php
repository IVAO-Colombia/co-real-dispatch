<?php

namespace App\Livewire\Admin;

use App\Models\PilotBooking as ModelsPilotBooking;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('layouts.app')]
class PilotBooking extends Component
{


    /**
     * PENDIENTES:
     *      - Boton eliminar reserva
     *      - Botón "Ver reserva"
     */
    #[Url(except: '')]
    public $search;
    public $bookings = "";
    public $booking;
    public $facilitysIvaoPilot,
        $facilitysIvaoController;
    public $type;

    public $modal = false;
    public $aircraft,
        $airline,
        $hub,
        $briefing,
        $pilot;

    public function mount()
    {
        $this->bookings = ModelsPilotBooking::all();
        $this->facilitysIvaoPilot = facilitysIvaoPilot();
        $this->facilitysIvaoController = facilitysIvaoController();
    }

    public function render()
    {
        // Check permisions
        $this->authorize("viewAny", ModelsPilotBooking::class);
        if ($this->search) {
            try {
                $pilot = User::where('vid', $this->search)->first();
                $this->bookings = ModelsPilotBooking::where('user_id', $pilot->id)->get();
            } catch (\Throwable $th) {
                // throw $th;
            }
        } else if (isset($this->type) && $this->type != "id" && $this->search) {
            $pilot = User::where('vid', $this->search)->first();
            $this->bookings = ModelsPilotBooking::where('hub', $this->type)
                ->where('user_id', $pilot->id)
                ->get();
        } else if (isset($this->type) && $this->type != "id") {
            $this->bookings = ModelsPilotBooking::where('hub', $this->type)
                ->get();
        } else {
            $this->bookings = ModelsPilotBooking::orderBy('id', 'asc')->get();
        }



        return view('livewire.admin.pilot-booking', [
            "bookings" => $this->bookings
        ]);
    }

    public function filter($type)
    {
        if ($type == "id") {
            $this->search = "";
        }
        return $this->type = $type;
    }

    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function showBooking($id)
    {
        $this->booking = ModelsPilotBooking::findOrFail($id);

        $this->openModal();
    }
}
