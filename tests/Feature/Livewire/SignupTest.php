<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Signup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SignupTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(Signup::class)
            ->assertStatus(200);
    }
}
