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
        <form action="{{ route('jobs.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="Full_name" :required="true">Full_name</x-label>
                <x-text-input type="text" name="Full_name" value="{{ auth()->user()->name }}" />
            </div>
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">salary</x-label>
                <x-text-input type="number" name="expected_salary" value="{{ old('expected_salary') }}" />
            </div>
            <div class="mb-4">
                <x-label for="Years_of_Experience" :required="true">Years of Experience</x-label>
                <x-text-input type="number" name="Years_of_Experience" value="{{ old('Years_of_Experience') }}" />
            </div>
            <div class="mb-4">
                <x-label for="Email_address" :required="true">Email Address</x-label>
                <x-text-input type="email" name="Email_address" value="{{ auth()->user()->email }}" />
            </div>
            <div class="mb-4">
                <x-label for="Phone_number" :required="true">Phone Number</x-label>
                <x-text-input type="phone" name="Phone_number" value="{{ old('Phone_number') }}" />
            </div>
            <div class="mb-4">
                <x-label for="Resume">Resume link / Your websitelink</x-label>
                <x-text-input type="url" name="Resume" value="{{ old('Resume') }}" />
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true">Uplaod your CV</x-label>
                <x-text-input type="file" name="cv" />
            </div>
            <x-button class="w-full mt-4">Apply</x-button>
        </form>
    </x-card>
</x-layout>
