@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Transaction</h1>
    <form action="{{ route('transactions.update', $transaction) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium">Category</label>
            <select name="category_id" id="category_id" class="w-full border p-2 rounded" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $transaction->category_id ? 'selected' : '' }}>
                        {{ $category->name }} ({{ ucfirst($category->type) }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium">Amount</label>
            <input type="number" name="amount" id="amount" value="{{ $transaction->amount }}" step="0.01" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label for="transaction_date" class="block text-sm font-medium">Date</label>
            <input type="date" name="transaction_date" id="transaction_date" value="{{ $transaction->transaction_date }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded">{{ $transaction->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
