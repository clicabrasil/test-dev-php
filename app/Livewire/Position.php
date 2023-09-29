<?php

namespace App\Livewire;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Livewire\Component;
use App\Models\Position as PositionModel;

class Position extends Component
{
    public PositionModel $position;

    public function render()
    {
        return view('livewire.position');
    }

    public function delete(int $id): void
    {
        PositionModel::find($id)->delete();
        redirect()->route('positions');
    }

    public function toggleActive(int $id)
    {
        $position = PositionModel::find($id);
        $position->active = !$position->active;
        $position->save();
    }

    public function apply(int $id)
    {
        auth()->user()->positions()->attach($id);
    }
}
