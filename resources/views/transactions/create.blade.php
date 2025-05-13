@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium">Category</label>
            <select name="category_id" id="category_id" class="w-full border p-2 rounded" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" data-photo="{{ $category->photo ? asset('storage/' . $category->photo) : '' }}">
                        {{ $category->name }} ({{ ucfirst($category->type) }})
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium">Category Photo Preview</label>
            <img id="category_photo_preview" src="" alt="Category Photo" class="w-24 h-24 object-cover rounded hidden">
        </div>
        <div class="mb-4">
            <label for="amount" class="block text-sm font-medium">Amount</label>
            <input type="number" name="amount" id="amount" step="0.01" class="w-full border p-2 rounded" required>
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="transaction_date" class="block text-sm font-medium">Date</label>
            <input type="date" name="transaction_date" id="transaction_date" class="w-full border p-2 rounded" required>
            <x-input-error :messages="$errors->get('transaction_date')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded"></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>

    <script>
        document.getElementById('category_id').addEventListener('change', function () {
            const preview = document.getElementById('category_photo_preview');
            const selectedOption = this.options[this.selectedIndex];
            const photoUrl = selectedOption.getAttribute('data-photo');
            if (photoUrl) {
                preview.src = photoUrl;
                preview.classList.remove('hidden');
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        });
    </script>
@endsection
