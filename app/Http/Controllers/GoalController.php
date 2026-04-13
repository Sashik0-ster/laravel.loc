<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\error;

class GoalController extends Controller
{

    public function index()
    {
        $goalsActive = Goal::where('user_id', Auth::id())
            ->latest()
            ->where('status', 'active')
            ->get();

        $goalsCompleted = Goal::where('user_id', Auth::id())
            ->latest()
            ->where('status', 'completed')
            ->get();

        return view('pages.goal', compact(['goalsActive', 'goalsCompleted']));
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
