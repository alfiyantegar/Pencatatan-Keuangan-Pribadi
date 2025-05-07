<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $income = Transaction::where('user_id', Auth::id())
            ->whereHas('category', function ($query) {
                $query->where('type', 'income');
            })->sum('amount');

        $expense = Transaction::where('user_id', Auth::id())
            ->whereHas('category', function ($query) {
                $query->where('type', 'expense');
            })->sum('amount');

        $balance = $income - $expense;

        $chartData = Transaction::select(
            DB::raw('DATE_FORMAT(transaction_date, "%Y-%m") as month'),
            DB::raw('SUM(CASE WHEN categories.type = "income" THEN amount ELSE 0 END) as income'),
            DB::raw('SUM(CASE WHEN categories.type = "expense" THEN amount ELSE 0 END) as expense')
        )
        ->join('categories', 'transactions.category_id', '=', 'categories.id')
        ->where('transactions.user_id', Auth::id())
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        return view('dashboard', compact('income', 'expense', 'balance', 'chartData'));
    }
}
