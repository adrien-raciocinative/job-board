<x-layout>
    <h1 class="my-10 text-center text-3xl font-medium text-slate-100  ">Sign in to your account</h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" type="email" />
            </div>

            <div class="mb-8">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password" />
            </div>

            <div class="mb-8 flex justify-between">
                <div>
                    <div class="flex space-x-2 items-center justify-center">
                        <input type="checkbox" name="remember"
                            class="rounded border-slate-300 text-indigo-600 shadow-sm">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>
                <div><a href="#" class="text-indigo-600 hover:underline">Reset the password</a></div>
            </div>

            <x-button type="submit" class="w-full text-base capitalize">Sign in</x-button>
        </form>
    </x-card>
</x-layout>
