<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * @param Request $response
     * @return View
     */
    public function index(Request $response): View
    {
        $authUser = Auth::user();

        $incomes = Income::where('user_id', Auth::id())
            ->latest() // нові зверху
            ->paginate(4);

        return view('pages.dashboard',compact(['incomes', 'authUser']));
    }
}

