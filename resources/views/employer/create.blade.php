<x-layout>
    <x-card>
        <form action="{{ route('employer.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="company_name" :requried="true">Company Name</x-label>
                <x-text-input name="company_name" />
            </div>
            <x-button class="w-full">Submit</x-button>
        </form>
    </x-card>
</x-layout>
