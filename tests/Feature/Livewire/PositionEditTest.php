<?php

namespace Tests\Feature\Livewire;

use App\Livewire\PositionEdit;
use App\Models\Position as PositionModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PositionEditTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        $position = PositionModel::factory()->create();

        Livewire::test(PositionEdit::class, ['position' => $position])
            ->assertStatus(200);
    }
}
