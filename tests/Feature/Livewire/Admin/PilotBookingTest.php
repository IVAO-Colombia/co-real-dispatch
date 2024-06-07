<?php

namespace Tests\Feature\Livewire\Admin;

use App\Livewire\Admin\PilotBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PilotBookingTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PilotBooking::class)
            ->assertStatus(200);
    }
}
