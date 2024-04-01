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
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'anonymous' }}: Applications
                    </a>
                </li>
                <li><a href="{{ route('my-jobs.index') }}">My Jobs</a></li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button class="text-slate-50 hover:text-slate-950" type="submit">Logout</x-button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('auth.create') }}">login</a></li>
            @endauth

        </ul>
    </nav>

    @if (session('error'))
        <div class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700">
            {{ session('error') }}
        </div>
    @elseif (session('success'))
        <div class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif


    @if ($errors->any())
        <div class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 " role="alert">
            <p class="font-bold">Uh-oh! It looks like there's a cloud in the sky:</p>
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-xl">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif






    {{ $slot }}

</body>

</html>
