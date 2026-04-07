<?php

namespace App\Http\Controllers;

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

        $incomes = DB::table('incomes')->paginate(10);
        $sum = DB::table('incomes')->sum('amount');
        $users = DB::table('users')->paginate(10);



        return view('pages.dashboard',compact(['incomes', 'sum', 'users', 'authUser']));
    }
}
