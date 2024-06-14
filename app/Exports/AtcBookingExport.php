<?php

namespace App\Exports;

use App\Enums\AtcBookingStatus;
use App\Models\AtcBooking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AtcBookingExport implements FromCollection, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return AtcBooking::all();
    }
    public function map($pilotBooking): array
    {
        return [
            $pilotBooking->id,
            $pilotBooking->dependence,
            $pilotBooking->start_at,
            $pilotBooking->end_at,
            $pilotBooking->pilot->vid,
            $pilotBooking->pilot->firstname,
            $pilotBooking->pilot->lastname,
            AtcBookingStatus::from($pilotBooking->status)->name,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Depedence',
            'Start_At',
            'End_At',
            'Pilot VID',
            'Pilot first Name',
            'Pilot last Name',
            'Pilot Status',
        ];
    }
}
