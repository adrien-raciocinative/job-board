<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />
    <div class="mb-8 text-right text-slate-50 capitalize">
        <x-link-button href="{{ route('my-jobs.create') }}" class="text-slate-50 hover:text-slate-950">Add new
            job</x-link-button>
    </div>

    @forelse ($jobs as $job )
        <x-job-card :$job>
            <div class="text-sm text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex items-center justify-between">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>Applied: {{ $application->created_at->diffForHumans() }}</div>
                            <div>Email: <a class="underline text-blue-700"
                                    href="mailto:{{ $application->Email_address }}">{{ $application->Email_address }}</a>
                            </div>
                            <div>Phone number: <a class="underline text-blue-700"
                                    href="tel:{{ $application->Phone_number }}"
                                    target="_blank">{{ $application->Phone_number }}</a> </div>
                            <div>Number of experience: {{ $application->Years_of_Experience }}</div>
                            <div>Resume <a class="underline text-blue-700" href="{{ $application->Resume }}"
                                    target="_blank">{{ $application->Resume }}</a> </div>
                            <div>Download CV</div>
                        </div>
                        <div>${{ number_format($application->expected_salary) }}</div>
                    </div>
                @empty
                    No applications yet.
                @endforelse
                <div class="flex space-x-2 ">
                    <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>

                    <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Delete</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium text-slate-50">
                No applications yet for this job.
            </div>
            <div class="text-center text-slate-50">Post your first job <a class="text-slate-50 hover:underline"
                    href="{{ route('my-jobs.create') }}">here!</a></div>
        </div>
    @endforelse
</x-layout>
