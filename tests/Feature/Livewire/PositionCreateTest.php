<?php

namespace Tests\Feature\Livewire;

use App\Livewire\PositionCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PositionCreateTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PositionCreate::class)
            ->assertStatus(200);
    }
}
