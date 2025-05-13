@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white p-6 rounded shadow" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" class="w-full border p-2 rounded" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium">Type</label>
            <select name="type" id="type" class="w-full border p-2 rounded" required>
                <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium">Photo</label>
            @if ($category->photo)
                <img src="{{ asset('storage/' . $category->photo) }}" alt="{{ $category->name }}" class="w-24 h-24 object-cover rounded mb-2">
            @endif
            <input type="file" name="photo" id="photo" class="w-full border p-2 rounded" accept="image/jpeg,image/png,image/jpg">
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
