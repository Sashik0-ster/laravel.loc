<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Auth\Incomes\IncomesRequest;
use App\Models\Income;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = DB::table('incomes')->paginate(4);
        return view('pages.income', compact('incomes'));
    }

    public function create(IncomesRequest $request)
    {
        $data = $request->validated();

        Income::create([
            'title' => $data['title'],
            'category' => $data['category'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'entry_date' => $data['entry_date'],
            'description' => $data['description'] ?? null,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Дохід успішно додано!');
    }

    public function delete()
    {
        //
    }
}
