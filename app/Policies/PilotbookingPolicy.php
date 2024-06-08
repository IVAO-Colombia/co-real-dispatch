<?php

namespace App\Policies;

use App\Models\PilotBooking;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PilotBookingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $teamWebmaster = Team::find(10);
        $teamEvents = Team::find(3);

        if (
            $user->currentTeam == $teamEvents && $teamEvents->hasUser($user) ||
            ($user->currentTeam == $teamWebmaster && $teamWebmaster->hasUser($user))
        ) {
            return true;
        } else {
            return false;
        };
    }
}
