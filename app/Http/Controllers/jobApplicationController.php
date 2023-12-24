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
    public function store(job $job, Request $request)
    {
        $job->JobApplications()->create([
            'user_id' => $request->user()->id,
            'Full_Name' => $request->user()->name,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000',
                'Years_of_Experience' => 'required|min:2',
                'Email_address' => 'required|email',
                'Phone_number' => 'required',
                'Resume' => 'nullable',
            ], [
                'Email_address.required' => 'Oh no! The email field is feeling lonely and needs some attention. Please provide your email address.',
                'Email_address.email' => 'Oopsie-doodle! It seems like you\'ve entered something that doesn’t quite resemble an email. Please double-check and try again.',
                'phone_number.required' => 'Our office phone is ringing off the hook, and we need your number to join the party! Even if it\'s a banana phone, we\'re cool with that.',
                'phone_number.regex' => 'Hold the banana! Your phone number looks a bit wonky. Please enter a 10-digit number, or grab a banana and try our banana phone hotline instead.',
                'Years_of_Experience.required' => 'Time flies when you’re having fun, but we need to know how much fun you’ve had! Please tell us your years of experience, even if it includes mastering the art of Netflix and chill.',
                'Years_of_Experience.integer' => 'Whoopsie-daisy! We need a whole number for your years of experience, not a fraction or imaginary number. Unless you\'ve been coding in your dreams, then we\'re impressed!',
                'Years_of_Experience.min' => 'Well, we appreciate honesty! But come on, you must have at least 0 years of experience. Unless you just crawled out of the coding womb, then welcome to the world of programming!'

            ])
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'job application submitted');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
