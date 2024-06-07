<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function pilot(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
