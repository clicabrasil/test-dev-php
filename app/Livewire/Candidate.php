<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Candidate extends Component
{
    public User $candidate;

    public function delete(int $id): void
    {
        User::find($id)->delete();
        redirect()->route('candidates');
    }

    public function render()
    {
        return view('livewire.candidate');
    }
}
