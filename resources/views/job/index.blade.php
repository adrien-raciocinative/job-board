<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
    ]" />

    <x-card class="mb-4 text-sm">

        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1  font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1  font-semibold">Experince</div>
                    <label for="experience" class="mb-1 space-x-2 flex items-center text-sm font-medium text-slate-500">
                        <input type="radio" name="experience" value="" @checked(!request('experience'))/>
                        <span>All</span>
                        @foreach ($experiences as $experience)
                            <input type="radio" name="experience" value="{{ $experience }}" @checked(request('experience') == $experience) />
                            <span>{{ Str::ucfirst($experience) }}</span>
                        @endforeach
                    </label>
                </div>
            </div>
            <input type="submit" value="Filter"
                class="w-full rounded-md border border-slate-300 px-2.5 py-1.5 text-center text-sm font-semibold  text-black shadow-sm hover:bg-slate-100">
        </form>

        <span
            class="my-4 flex w-fit rounded-md border border-slate-300 px-2.5 py-1.5 text-center text-sm font-semibold  text-black shadow-sm hover:bg-slate-100">Job
            Count: <b class="ml-2">{{$jobs->count() }}</b></span>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <x-link-button :href="route('jobs.show', $job)">
                show
            </x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
