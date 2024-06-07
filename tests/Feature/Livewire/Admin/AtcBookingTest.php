<?php

namespace Tests\Feature\Livewire\Admin;

use App\Livewire\Admin\AtcBooking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AtcBookingTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AtcBooking::class)
            ->assertStatus(200);
    }
}
