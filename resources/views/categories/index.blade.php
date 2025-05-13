@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Categories</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add Category</a>
    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Photo</th>
                <th class="p-2">Name</th>
                <th class="p-2">Type</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="p-2">
                        @if ($category->photo)
                            <img src="{{ asset('storage/' . $category->photo) }}" alt="{{ $category->name }}" class="w-12 h-12 object-cover rounded">
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td class="p-2">{{ $category->name }}</td>
                    <td class="p-2">{{ ucfirst($category->type) }}</td>
                    <td class="p-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
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
