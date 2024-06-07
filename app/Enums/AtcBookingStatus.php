<?php

namespace App\Enums;

enum AtcBookingStatus: string
{
    case Rejected = "1";
    case Pending = "2";
    case Booked = "3";
}
