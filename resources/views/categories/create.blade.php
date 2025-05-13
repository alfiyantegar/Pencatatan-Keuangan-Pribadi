@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add Category</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded shadow" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="type" class="block text-sm font-medium">Type</label>
            <select name="type" id="type" class="w-full border p-2 rounded" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium">Photo</label>
            <input type="file" name="photo" id="photo" class="w-full border p-2 rounded" accept="image/jpeg,image/png,image/jpg">
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
    </form>
@endsection
