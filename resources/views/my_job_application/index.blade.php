<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />
    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex items-center justify-between text-sm text-slate-500">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }} <br>
                        Applicant experience: {{ $application->Years_of_Experience }}
                    </div>
                    <div>
                        Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                        {{ $application->job->job_applications_count - 1 }}
                    </div>
                    <div>
                        Your proposed salary ${{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        Average salary ${{ number_format($application->job->job_applications_avg_expected_salary) }}

                    </div>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
            </x-card-job>
        @empty
            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium text-slate-50">
                    No job application yet
                </div>
                <div class="text-center text-slate-50">
                    Go find some job <a class=" font-bold hover:underline" href="{{ route('jobs.index') }}">here!</a>
                </div>

            </div>
    @endforelse

</x-layout>
