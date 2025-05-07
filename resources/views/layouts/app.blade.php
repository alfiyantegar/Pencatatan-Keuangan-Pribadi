<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Finance Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold">Personal Finance Tracker</a>
            <div>
                @auth
                    <a href="{{ route('transactions.index') }}" class="px-4">Transactions</a>
                    <a href="{{ route('categories.index') }}" class="px-4">Categories</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="px-4">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-4">Login</a>
                    <a href="{{ route('register') }}" class="px-4">Register</a>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>
