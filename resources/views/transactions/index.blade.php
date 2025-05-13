@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Transactions</h1>
    <a href="{{ route('transactions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Transaction</a>
    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Category Photo</th>
                <th class="p-2">Category</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Date</th>
                <th class="p-2">Description</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td class="p-2">
                        @if ($transaction->category->photo)
                            <img src="{{ asset('storage/' . $transaction->category->photo) }}" alt="{{ $transaction->category->name }}" class="w-12 h-12 object-cover rounded">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="p-2">{{ $transaction->category->name }}</td>
                    <td class="p-2">{{ number_format($transaction->amount, 2) }}</td>
                    <td class="p-2">{{ $transaction->transaction_date }}</td>
                    <td class="p-2">{{ $transaction->description ?? '-' }}</td>
                    <td class="p-2">
                        <a href="{{ route('transactions.edit', $transaction) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
