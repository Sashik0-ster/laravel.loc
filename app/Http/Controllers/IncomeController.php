<?php

namespace App\Http\Controllers;

use App\Http\Requests\Incomes\IncomesRequest;
use App\Models\Income;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::where('user_id', Auth::id())
            ->latest() // нові зверху
            ->paginate(4, ['*'], 'cards_page');

        $allIncomes = Income::where('user_id', Auth::id())
            ->orderBy('amount', 'desc')
            ->paginate(10, ['*'], 'table_page');

        return view('pages.income', compact('incomes', 'allIncomes'));
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

    public function destroy(Income $income)
    {
        $income->delete();
        return response()->json(['success' => true]);
    }
}
