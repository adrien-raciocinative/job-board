<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" class="mb-4" />
    <x-card class="mb-8">
        <form class="mt-3" action="{{ route('my-jobs.update', $job) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Job Location</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Job salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Job description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    {{-- <x-radio-group name="experience" :value="$job->experience" :options="App\Models\Job::$experiences" :allOption="false" /> --}}
                    <x-radio-group name="experience" :value="$job->experience" :all-option="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\Job::$experiences),
                        \App\Models\Job::$experiences,
                    )" />
                </div>

                <div>
                    <x-label for="category" :required="true">category</x-label>
                    <x-radio-group name="category" :value="$job->category" :options="App\Models\Job::$jobCategories" :allOption="false" />
                </div>
                <div class="col-span-2">
                    <x-button class="w-full col-span-2">Edit Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
