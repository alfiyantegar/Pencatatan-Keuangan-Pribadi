@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-green-100 p-4 rounded">
            <h2 class="text-lg">Total Income</h2>
            <p class="text-2xl font-bold">{{ number_format($income, 2) }}</p>
        </div>
        <div class="bg-red-100 p-4 rounded">
            <h2 class="text-lg">Total Expense</h2>
            <p class="text-2xl font-bold">{{ number_format($expense, 2) }}</p>
        </div>
        <div class="bg-blue-100 p-4 rounded">
            <h2 class="text-lg">Balance</h2>
            <p class="text-2xl font-bold">{{ number_format($balance, 2) }}</p>
        </div>
    </div>
    <div>
        <canvas id="financeChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('financeChart').getContext('2d');
        const chartData = @json($chartData);
        const labels = chartData.map(data => data.month);
        const incomeData = chartData.map(data => data.income);
        const expenseData = chartData.map(data => data.expense);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Income',
                        data: incomeData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Expense',
                        data: expenseData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
