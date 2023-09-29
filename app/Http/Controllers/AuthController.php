<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! auth()->attempt($credentials)) {
            return back()->with('error', 'E-mail ou senha incorretos.');
        }

        return redirect()->route('home');
    }

    public function signup(SignupRequest $request)
    {
        $credentials = $request->validated();

        $user = User::create($credentials);

        auth()->login($user);

        return redirect()->route('home');
    }
}
