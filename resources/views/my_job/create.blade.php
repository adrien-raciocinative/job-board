<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index'), 'Create' => '#']" class="mb-4" />
    <x-card class="mb-8">
        <form class="mt-3" action="{{ route('my-jobs.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Job Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Job salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Job description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>
                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :value="old('experience')" :options="App\Models\job::$experiences" :allOption="false" />
                </div>

                <div>
                    <x-label for="category" :required="true">category</x-label>
                    <x-radio-group name="category" :value="old('category')" :options="App\Models\job::$jobCategories" :allOption="false" />
                </div>
                <div class="col-span-2">
                    <x-button class="w-full col-span-2">Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
