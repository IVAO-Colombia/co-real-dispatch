<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PilotBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        "airline",
        "user_id",
        "hub",
        "aircraft",
        "briefing"
    ];

    public function pilot(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
