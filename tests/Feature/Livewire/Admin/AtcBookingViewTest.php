<?php

namespace Tests\Feature\Livewire\Admin;

use App\Livewire\Admin\AtcBookingView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AtcBookingViewTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AtcBookingView::class)
            ->assertStatus(200);
    }
}
