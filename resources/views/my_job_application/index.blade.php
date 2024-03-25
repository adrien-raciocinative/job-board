<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />
    @forelse ($applications as $application)
        <x-job-card :job="$application->job"></x-card-job>
        @empty
    @endforelse

</x-layout>
