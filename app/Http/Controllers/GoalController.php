<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class GoalController extends Controller
{

    public function index()
    {
        $goals = auth()->user()->goals()->latest()->get();
        return view('pages.goal', compact('goals'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:0',
            'collected_amount' => 'nullable|numeric|min:0',
            'deadline' => 'required|date',
            'status' => 'nullable|in:active,completed,cancelled',
        ]);

        $validated['collected_amount'] ??= 0;
        $validated['status'] ??= 'active';

        auth()->user()->goals()->create($validated);

        return redirect()->back()->with('success', 'Ціль успішно додана!');
    }

}
