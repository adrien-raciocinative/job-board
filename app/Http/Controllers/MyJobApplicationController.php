<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use PhpParser\Node\Stmt\Return_;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_job_application.index', [
            'applications' => auth()->user()->JobApplications()->with(['job' => fn ($query) => $query->withCount('JobApplications')->withAvg('JobApplications', 'expected_salary')->withTrashed(), 'job.employer'])->latest()->get()
        ]);
    }

    public function destroy(jobApplication $myJobApplication)
    {

        // dd($myJobApplication);
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'job application removed');
    }
}
