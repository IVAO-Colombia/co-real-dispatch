<?php

namespace Tests\Feature\Livewire\Admin;

use App\Livewire\Admin\PilotBookingView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PilotBookingViewTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PilotBookingView::class)
            ->assertStatus(200);
    }
}
