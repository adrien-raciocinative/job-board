<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Job Board</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mx-auto px-8 mt-10 max-w-2xl bg-gradient-to-r from-sky-500 to-indigo-500 after:text-slate-700">
    {{ auth()->user()->name ?? 'login as Guest' }}

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    {{ $slot }}

</body>

</html>
