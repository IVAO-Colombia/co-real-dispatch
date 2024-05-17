<?php

namespace App\Livewire;

use App\Models\User;
//use http\Client\Curl\User;
use Livewire\Component;

class SelectHub extends Component
{
    public $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.select-hub');
    }
}
