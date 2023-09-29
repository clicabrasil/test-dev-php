<?php

namespace App\Livewire;

use App\Models\Position;
use Livewire\Component;

class PositionEdit extends Component
{
    public Position $position;

    public function render()
    {
        return view('livewire.position-edit');
    }
}
