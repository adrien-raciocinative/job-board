<?php

namespace App\Http\Controllers;

use App\Http\Requests\jobRequest;
use App\Models\job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);

        return view('my_job.index', [
            'jobs' => auth()->user()->employer->jobs()->with('employer', 'jobApplications', 'jobapplications.user')->withTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', job::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(jobRequest $request)
    {

        $this->authorize('create', job::class);
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success', 'Job was  added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(jobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());
        // dd($myjob) ;
        return redirect()->route('my-jobs.index')->with('success', 'Job was updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job $myJob)
    {
        $myJob->delete();

        return redirect(route('my-jobs.index'))->with('success', 'Job was deleted');
    }
}
