<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function update(User $candidate, UserRequest $request): RedirectResponse
    {
        $candidate->update($request->validated());

        return redirect()->route('candidate', ['candidate' => $candidate->id]);
    }
}
