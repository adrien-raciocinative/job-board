<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobApplied extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $userName;
    public $jobLink;
    public $jobTitle;
    public $userApplications;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $userName, $jobLink, $jobTitle, $userApplications)
    {
        $this->subject = $subject;
        $this->userName = $userName;
        $this->jobLink = $jobLink;
        $this->jobTitle = $jobTitle;
        $this->userApplications = $userApplications;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('adrienmbah19@gmail.com', 'Job board'),
            replyTo: [
                new Address('adrienmbah19@gmail.com', 'Job board')
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail-template.succesfull-job-application',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
