<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Candidate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CandidateTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create(['admin' => true]);

        Livewire::test(Candidate::class, ['candidate' => $user])
            ->assertStatus(200);
    }
}
