<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Home;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(Home::class)
            ->assertStatus(200);
    }

    /** @test */
    public function assert_texts_are_correct()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(Home::class)
            ->assertSee('Candidatos')
            ->assertSee('Vagas');
    }
}
