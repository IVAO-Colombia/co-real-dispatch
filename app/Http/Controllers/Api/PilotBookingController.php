<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PilotBookingCollection;
use App\Http\Resources\PilotBookingResource;
use App\Models\PilotBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PilotBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PilotBookingCollection(PilotBooking::all());
    }

    /**
     * Display the specified resource.
     */
    public function show($vid)
    {
        // Search if pilot exist by VID
        $pilot = User::where('vid', $vid)->first();
        // Search Pilot booking by User Id
        $booking = PilotBooking::where('user_id', $pilot->id)->first();

        if (isset($booking)) {
            return new PilotBookingResource($booking);
        } else {
            return response()->json([
                "Error" => "Not found registers with VID $vid, try again or later"
            ], 404);
        }
    }

    public function store($vid, Request $request)
    {
        $documents = [];
        foreach ($request->file() as $file) {
            $filePath = Storage::disk('documents')->put('/', $file);
            $documents[] = env('APP_URL') . "/storage/briefing/" . $filePath;
        }

        // Search if pilot exist by VID
        $pilot = User::where('vid', $vid)->first();
        // Search Pilot booking by User Id
        $booking = PilotBooking::where('user_id', $pilot->id)->first();

        $pilotBooking = PilotBooking::updateOrCreate(
            ["id" => $booking->id],
            ["briefing" => json_encode($documents)]
        );

        if (isset($booking)) {
            return new PilotBookingResource($booking);
        } else {
            return response()->json([
                "Error" => "Not found registers with VID $vid, try again or later"
            ], 404);
        }
    }
}
