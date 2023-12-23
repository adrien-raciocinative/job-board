<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Job Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mx-auto px-8 mt-10 max-w-2xl bg-gradient-to-r from-sky-500 to-indigo-500 after:text-slate-700">
    <nav class="mb-10 flex justify-between items-center text-lg font-medium text-slate-50">
        <ul class="flex space-x-4">
            <li><a href="{{ route('jobs.index') }}">Home</a></li>
        </ul>
        <ul class="flex space-x-4 items-center">
            @auth
                {{ auth()->user()->name ?? 'anonymous' }}
                <form action="{{ route('auth.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE');
                    <x-button class="text-slate-50 hover:text-slate-950" type="submit">Logout</x-button>
                </form>
            @else
                <li><a href="{{ route('auth.create') }}">login</a></li>
            @endauth

        </ul>
    </nav>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    {{ $slot }}

</body>

</html>
