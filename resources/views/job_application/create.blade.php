<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => route('jobs.show', $job),
        'Apply' => '#',
    ]" />
    <x-job-card :$job />
    <x-card>
        <h2 class="mb-4 text-xl font-medium">
            Your Job Application
        </h2>
        <form action="{{ route('jobs.application.store', $job) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="Full_name" class="mb-2 block text-x font-medium text-slate-900">Full Name</label>
                <x-text-input type="text" name="Full_name" value="{{ @auth()->user()->name }}" />
            </div>
            <div class="mb-4">
                <label for="expected_salary" class="mb-2 block text-x font-medium text-slate-900">Expected
                    salary</label>
                <x-text-input type="number" name="expected_salary" value="{{ old('expected_salary') }}" />
            </div>
            <div class="mb-4">
                <label for="Years_of_Experience" class="mb-2 block text-x font-medium text-slate-900">Years of
                    Experience</label>
                <x-text-input type="number" name="Years_of_Experience" value="{{ old('Years_of_Experience') }}" />
            </div>
            <div class="mb-4">
                <label for="Email_address" class="mb-2 block text-x font-medium text-slate-900">Email Address</label>
                <x-text-input type="email" name="Email_address" value="{{ @auth()->user()->email }}" />
            </div>
            <div class="mb-4">
                <label for="Phone_number" class="mb-2 block text-x font-medium text-slate-900">Phone Number</label>
                <x-text-input type="phone" name="Phone_number" value="{{ old('Phone_number') }}" />
            </div>
            <div class="mb-4">
                <label for="Resume" class="mb-2 block text-x font-medium text-slate-900">Resume link</label>
                <x-text-input type="url" name="Resume" value="{{ old('Resume') }}" />
            </div>
            <x-button class="w-full mt-4">Apply</x-button>
        </form>
    </x-card>
</x-layout>
