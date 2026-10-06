<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::query();

        if ($category = $request->query('category')) {
            $query->where('category', $category);
        }

        $total = (clone $query)->sum('amount');
        $items = $query->orderByDesc('spent_on')->paginate(10)->withQueryString();
        $categories = ['Food', 'Transport', 'Bills', 'Shopping', 'Health', 'Other'];

        return view('expenses.index', compact('items', 'total', 'categories'));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        Expense::create($this->validated($request));

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', ['item' => $expense]);
    }

    public function update(Request $request, Expense $expense)
    {
        $expense->update($this->validated($request, $expense));

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }

    private function validated(Request $request, ?Expense $expense = null): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'category' => 'required|in:Food,Transport,Bills,Shopping,Health,Other',
            'spent_on' => 'required|date',
        ]);

        return $data;
    }
}
