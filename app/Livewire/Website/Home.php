<?php

namespace App\Livewire\Website;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('app')]
class Home extends Component
{


    public function render()
    {
        return view('livewire.website.info');
    }
}
