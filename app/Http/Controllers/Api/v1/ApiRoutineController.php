<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApiRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routines = Routine::orderBy('created_at', 'desc')->with('user')->get();

        return $routines;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'steps' => 'required|string|max:5000',
            'hair_types' => 'required|array|min:1',
            'hair_types.*' => 'string|in:2A,2B,2C,3A,3B,3C,4A,4B,4C',
            'frequency' => 'nullable|string|max:255',
        ]);

        $user = $request->user();
        $routine = new Routine();

        $routine->title = $validated['title'];
        $routine->description = $validated['description'];
        $routine->steps = $validated['steps'];
        $routine->hair_types = $validated['hair_types'];
        $routine->frequency = $validated['frequency'] ?? null;
        $routine->user()->associate($user);

        $routine->save();

        return $routine;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $routine = Routine::with('user')->findOrFail($id);

        return $routine;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'steps' => 'required|string|max:5000',
            'hair_types' => 'required|array|min:1',
            'hair_types.*' => 'string|in:2A,2B,2C,3A,3B,3C,4A,4B,4C',
            'frequency' => 'nullable|string|max:255',
        ]);

        $routine = Routine::findOrFail($id);

        Gate::authorize('update', $routine);

        $routine->title = $validated['title'];
        $routine->description = $validated['description'];
        $routine->steps = $validated['steps'];
        $routine->hair_types = $validated['hair_types'];
        $routine->frequency = $validated['frequency'] ?? null;

        $routine->save();

        return $routine;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $routine = Routine::findOrFail($id);

        Gate::authorize('delete', $routine);

        $routine->delete();

        return response()->noContent();
    }
}