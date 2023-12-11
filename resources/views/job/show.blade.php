<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => '#',
    ]" />
    <x-job-card :$job>
        <p class="text-slate-500 text-sm mb-4">{!! nl2br(e($job->description)) !!}</p>
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} jobs
        </h2>
        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherjob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div><a href="{{ route('jobs.show', $otherjob) }}">{{ $otherjob->title }}</a></div>
                        <div class="text-xs">{{ $otherjob->created_at->diffForHumans() }} at {{ $otherjob->location }}</div>
                    </div>
                    <div class="">
                        ${{ number_format($otherjob->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
