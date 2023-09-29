<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;

class PositionController extends Controller
{
    public function create(PositionRequest $request): RedirectResponse
    {
        Position::create($request->validated());

        return redirect()->route('positions');
    }

    public function update(Position $position, PositionRequest $request): RedirectResponse
    {
        $position->update($request->validated());

        return redirect()->route('positions');
    }
}
