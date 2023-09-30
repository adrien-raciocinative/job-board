<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;

class jobController extends Controller
{
    /**npm run dev
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = job::$experiences;
        $jobs = job::query();

        $jobs->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('description', 'like', '%' . request('search') . '%');
            })->when(request('min_salary'), function ($query) {
                $query->where('salary', '>=', request('min_salary'));
            })->when(request('max_salary'), function ($query) {
                $query->where('salary', '<=', request('max_salary'));
            })->when(request('experience'), function ($query) {
                $query->where('experience', 'like',  request('experience'));
            });
        });
        return view('job.index', ['jobs' => $jobs->get(), 'experiences' => $experiences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(job $job)
    {
        //We use this compact as we only have one variable to poss to the view
        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
