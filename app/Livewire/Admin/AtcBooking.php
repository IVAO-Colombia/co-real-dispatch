<?php

namespace App\Livewire\Admin;

use App\Enums\AtcBookingStatus;
use App\Exports\AtcBookingExport;
use App\Exports\PilotBookingExport;
use App\Helpers\Bookings;
use App\Http\Resources\PilotBookingCollection;
use App\Models\AtcBooking as ModelsAtcBooking;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class AtcBooking extends Component
{
    #[Url()]
    public $search = "";
    public $bookings = "";
    public $facilitysIvaoController, $facilitysIvaoPilot;
    public $type;
    public $click = false;

    #[Layout('layouts.app')]

    public function mount()
    {
        $this->facilitysIvaoController = facilitysIvaoController();
        $this->facilitysIvaoPilot = facilitysIvaoPilot();
    }

    public function render()
    {
        $this->authorize('viewAny', ModelsAtcBooking::class);

        if ($this->search) {
            try {
                $pilot = User::where('vid', $this->search)->first();
                $this->bookings = ModelsAtcBooking::where('user_id', $pilot->id)->get();
            } catch (\Throwable $th) {
                // throw $th;
            }
        } else if (isset($this->type) && $this->type != "id" && $this->search) {
            $pilot = User::where('vid', $this->search)->first();
            $this->bookings = ModelsAtcBooking::where('status', AtcBookingStatus::from($this->type))
                ->where('user_id', $pilot->id)
                ->get();
        } else if (isset($this->type) && $this->type != "id") {
            $this->bookings = ModelsAtcBooking::where('status', $this->type)
                ->get();
        } else {
            $this->bookings = ModelsAtcBooking::orderBy('id', 'asc')->get();
        }

        return view('livewire.admin.atc-booking', [
            "bookings" => $this->bookings
        ]);
    }

    public function confirmBooking($id)
    {
        $booking = ModelsAtcBooking::findOrFail($id);
        $hasOtherBooking = ModelsAtcBooking::where('status', AtcBookingStatus::Booked)
            ->where('dependence', $booking->dependence)
            ->where('start_at', $booking->start_at)
            ->where('end_at', $booking->end_at)
            ->first();

        if (!isset($hasOtherBooking)) {
            $booking->status = AtcBookingStatus::Booked;
            $booking->save();
            return session()->flash("message", "Successfully approved");
        } else {
            return session()->flash("error", "Has other booking in $booking->dependence at $booking->start_at UTC");
        }
    }

    public function pendingBooking($id)
    {
        $booking = ModelsAtcBooking::findOrFail($id);
        $booking->status = AtcBookingStatus::Pending;
        $booking->save();
        return session()->flash("message", "Successfully pending status");
    }

    public function filter($type)
    {
        if ($type == "id") {
            $this->search = "";
        }
        return $this->type = $type;
    }

    public function reject($id)
    {
        $booking = ModelsAtcBooking::findOrFail($id);
        $booking->status = AtcBookingStatus::Rejected;
        $booking->save();
        return session()->flash("message", "Successfully rejected");
    }
    public function export()
    {
        $fileName = Bookings::getExportName("Atc");
        return Excel::download(new AtcBookingExport, $fileName . ".xlsx");
    }


    public function delete($id)
    {
        ModelsAtcBooking::findOrFail($id)->delete();
        return session()->flash("message", "Successfully deleted");
    }
}
