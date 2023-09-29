<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Livewire\Candidate;
use App\Livewire\CandidateEdit;
use App\Livewire\Candidates;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\PositionCreate;
use App\Livewire\PositionEdit;
use App\Livewire\Positions;
use App\Livewire\Signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('home', Home::class)->name('home');
    Route::get('positions', Positions::class)->name('positions');
    Route::get('candidates', Candidates::class)->name('candidates');
    Route::get('candidates/{candidate}', Candidate::class)->name('candidate');
    Route::get('candidate-edit/{candidate}', CandidateEdit::class)->name('candidate-edit');
    Route::get('', fn () => redirect()->route('home'));
    Route::put('candidate-update/{candidate}', [UserController::class, 'update'])->name('candidate-update');
    Route::get('position-edit/{position}', PositionEdit::class)->name('position-edit');
    Route::put('position-update/{position}', [PositionController::class, 'update'])->name('position-update');
    Route::get('create-position', PositionCreate::class)->name('create-position');
    Route::post('position-store', [PositionController::class, 'create'])->name('position-store');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login-post');
    Route::get('signup', Signup::class)->name('signup');
    Route::post('signup', [AuthController::class, 'signup'])->name('signup-post');
});
