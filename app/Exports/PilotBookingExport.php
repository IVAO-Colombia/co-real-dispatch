<?php

namespace App\Exports;

use App\Http\Resources\PilotBookingCollection;
use App\Models\PilotBooking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PilotBookingExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PilotBooking::all();
    }

    public function map($pilotBooking): array
    {
        return [
            $pilotBooking->id,
            $pilotBooking->hub,
            $pilotBooking->airline,
            $pilotBooking->aircraft,
            $pilotBooking->pilot->vid,
            $pilotBooking->pilot->firstname,
            $pilotBooking->pilot->lastname,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Hub',
            'Airline',
            'Aircraft',
            'Pilot VID',
            'Pilot first Name',
            'Pilot last Name',
        ];
    }
}
