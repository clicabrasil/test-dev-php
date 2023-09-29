<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Candidates extends Component
{
//    use WithPagination;
// the trait created bugs
    #[Url]
    public int $perPage = 20;
    #[Url]
    public string $column = 'name';
    #[Url]
    public string $query = '';
    #[Url]
    public string $sortDirection = 'asc';

    public function render()
    {
        return view('livewire.candidates', [
            'candidates' => User::candidate()
                ->orderBy($this->column, $this->sortDirection)
                ->where($this->column, 'like', "%{$this->query}%")
                ->paginate($this->perPage)
        ]);
    }

    public function deleteAll()
    {
        User::candidate()->delete();
    }
}
