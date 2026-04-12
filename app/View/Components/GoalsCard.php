<?php

namespace App\View\Components;

use App\Models\Goal;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class GoalsCard extends Component
{
    public function __construct(public Goal $goal)
    {
    }

    public function render(): View
    {
        return view('components.goals-card');
    }
}
