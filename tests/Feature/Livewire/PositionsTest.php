<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Positions;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PositionsTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(Positions::class)
            ->assertStatus(200);
    }

    /** @test */
    public function assert_data_is_correct()
    {
        $user = User::factory()->create();
        Position::factory()->create(['name' => 'John', 'description' => 'Doe']);

        Livewire::actingAs($user)
            ->test(Positions::class)
            ->assertSee('John')
            ->assertSee('Doe');
    }

    /** @test */
    public function is_not_accessible_if_not_logged_in()
    {
        $this->get(route('positions'))
            ->assertRedirect(route('login'));
    }
}
