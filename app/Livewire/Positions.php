<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use App\Models\Position;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use function Termwind\render;

class Positions extends Component
{
//    use WithPagination;
// the trait created bugs
// lembrar das Rules
    #[Url]
    public int $perPage = 20;
    #[Url]
    public string $column = 'name';
    #[Url]
    public string $query = '';
    #[Url]
    public string $sortDirection = 'asc';

    public function render(): View
    {
        return view('livewire.positions', [
            'positions' => Position::orderBy($this->column, $this->sortDirection)
                ->where($this->column, 'like', "%{$this->query}%")
                ->paginate($this->perPage)
        ]);
    }

    public function deleteAll()
    {
        Position::truncate();
    }
}
