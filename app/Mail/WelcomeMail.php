<?php

namespace App\Mail;

use App\Models\JobSeeker;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $jobSeeker;

    /**
     * Create a new message instance.
     */
    public function __construct(JobSeeker $jobSeeker)
    {
        $this->jobSeeker = $jobSeeker;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Welcome to the Job Portal')
                    ->view('emails.welcome');
    }
}
