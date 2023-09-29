<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CandidateEdit extends Component
{
    public User $candidate;

    public function render()
    {
        return view('livewire.candidate-edit');
    }
}
