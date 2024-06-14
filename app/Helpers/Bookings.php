<?php

namespace App\Helpers;

use App\Models\PilotBooking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Bookings
{
    public static function getPrincipalHub()
    {
        $skbo = PilotBooking::where('hub', "SKBO")->count();
        $skrg = PilotBooking::where('hub', "SKRG")->count();
        $skbq = PilotBooking::where('hub', "SKBQ")->count();

        if ($skbo > $skrg && $skbo > $skbq) {
            return "SKBO";
        } elseif ($skrg > $skbo && $skrg > $skbq) {
            return "SKRG";
        } elseif ($skbq > $skrg && $skbq > $skbo) {
            return "SKBO";
        } else {
            return "N/A";
        }
    }

    public static function getExportName($type = "Pilot")
    {
        $user = Auth::user();
        $date = Carbon::now();
        return "$type" . "booking_request_$user->vid" . "_$date";
    }
}
