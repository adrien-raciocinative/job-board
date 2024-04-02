<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Http\Requests\jobRequest;
use Illuminate\Http\Request;

class MyJobConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('my_job.index', [
            'jobs' => auth()->user()->employer->jobs()->with('employer', 'jobApplications', 'jobapplications.user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(jobRequest $request)
    {


        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success', 'Job was  added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(jobRequest $request, Job $myjob)
    {
        $myjob->update($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job was updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
