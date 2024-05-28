<?php

namespace App\Http\Controllers;

use App\Mail\JobApplied;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendWelcomeEmail()
    {
        $user = auth()->user();
        $toEmail = $user->email;
        $userName = $user->name;
        $subject = 'Welcome to Job Board';

        $response = Mail::to($toEmail)->send(new WelcomeEmail($subject, $userName));

        // dd($response);
    }

    public function SendJobApplicationEmail($jobLink, $jobTitle, $userApplications)
    {

        $user = auth()->user();
        $userName = $user->name;
        $subject = 'Application Successful';
        $toEmail = $user->email;
        $response = Mail::to($toEmail)->send(new JobApplied($subject, $userName, $jobLink, $jobTitle, $userApplications));
    }
}
