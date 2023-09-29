<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Position;
use App\Models\User;
use App\Models\Position as PositionModel;
use Livewire\Livewire;
use Tests\TestCase;

class PositionTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();
        $position = PositionModel::factory()->create();

        Livewire::actingAs($user)
            ->test(Position::class, ['position' => $position])
            ->assertStatus(200);
    }
}
