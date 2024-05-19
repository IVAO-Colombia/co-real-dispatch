<?php

namespace App\Http\Resources;

use App\Models\PilotBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PilotBookingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'Development' => [
                    "Creator" => "Colombia Webmaster development",
                    "Year" => 2024,
                    "email" => "co-web@ivao.aero",
                    "Users" => ["Julian Ramirez", "Franklin Prieto", "Martín Sierra"],
                ],
                'path' => config('app.url') . "/pilot/booking/",
                'total' => PilotBooking::all()->count(),
            ]
        ];
    }
}
