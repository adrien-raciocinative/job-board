<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;

class jobApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(job $job)
    {
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
