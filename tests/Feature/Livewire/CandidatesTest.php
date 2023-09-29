<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Candidates;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CandidatesTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(Candidates::class)
            ->assertStatus(200);
    }

    /** @test */
    public function assert_data_is_correct()
    {
        $user1 = User::factory()->create(['admin' => true]);
        $user = User::factory()->create(['name' => '0000', 'admin' => false]);

        Livewire::actingAs($user1)
            ->test(Candidates::class)
            ->assertSee($user->name)
            ->assertSee($user->email);
    }

    /** @test */
    public function is_not_accessible_if_not_logged_in()
    {
        $this->get(route('candidates'))
            ->assertRedirect(route('login'));
    }
}
