<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AtcBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        "dependence",
        "start_at",
        "end_at",
        "user_id",
        "status"
    ];

    public function pilot(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
