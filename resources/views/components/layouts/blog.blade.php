<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'OnlyFlans' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">

<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-amber-600">
            OnlyFlans 🍮
        </a>

    <nav class="flex items-center gap-6">

    <a href="/" class="hover:text-amber-600">Home</a>
    <a href="{{ route('recipes.index') }}" class="hover:text-amber-600">Recipes</a>

    {{-- Logged in --}}
    @auth
        <a href="{{ route('recipes.create') }}" class="hover:text-amber-600">
            Add Recipe
        </a>

        <a href="{{ route('recipes.mine') }}" class="hover:text-amber-600">
            My Recipes
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="text-sm text-gray-600 hover:text-red-600">
                Logout
            </button>
        </form>
    @endauth

    {{-- Logged out --}}
    @guest
        <a href="{{ route('login') }}" class="hover:text-amber-600">
            Login
        </a>

        <a href="{{ route('register') }}"
           class="px-4 py-2 rounded-lg hover:bg-amber-700 transition">
            Register
        </a>
    @endguest

</nav>



    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-10">
@if (session('success'))
    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded">
            {{ session('success') }}
        </div>
    </div>
@endif

    {{ $slot }}
</main>

<footer class="border-t text-center text-sm text-gray-500 py-6">
    © 2025 OnlyFlans
</footer>

</body>
</html>
