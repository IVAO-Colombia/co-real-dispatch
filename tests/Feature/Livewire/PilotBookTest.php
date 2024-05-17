<?php

namespace Tests\Feature\Livewire;

use App\Livewire\PilotBook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PilotBookTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PilotBook::class)
            ->assertStatus(200);
    }
}
