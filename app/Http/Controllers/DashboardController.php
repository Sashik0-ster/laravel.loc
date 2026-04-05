<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $response)
    {
        $incomes = DB::table('incomes')->paginate(4);
        $sum = DB::table('incomes')->sum('amount');
        $users = DB::table('users')->paginate(4);

        return view('pages.dashboard',compact(['incomes', 'sum', 'users']));
    }
}
