<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PilotBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "hub" => $this->hub,
            "airline" => $this->airline,
            "aircraft" => $this->aircraft,
            "pilot" => [
                "vid" => $this->pilot->vid,
                "first_name" => $this->pilot->firstName,
                "last_name" => $this->pilot->lastName,
                "division" => $this->pilot->division,
                "rating_atc" => $this->pilot->ratingatc,
                "rating_pilot" => $this->pilot->ratingpilot,
                "staff" => $this->pilot->staff
            ],
            "briefing" => json_decode($this->briefing)
        ];
    }
}
