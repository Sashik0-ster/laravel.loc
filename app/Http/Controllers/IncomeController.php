<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = DB::table('incomes')
            ->whereMonth('entry_date', Carbon::now()->month)
            ->orderByDesc('entry_date')
            ->get();
        return view('pages.income', compact('incomes'));
    }
}
