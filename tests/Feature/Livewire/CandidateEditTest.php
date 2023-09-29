<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CandidateEdit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CandidateEditTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        $user = User::factory()->create();

        Livewire::test(CandidateEdit::class, ['candidate' => $user])
            ->assertStatus(200);
    }
}
