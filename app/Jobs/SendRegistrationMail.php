<?php

namespace App\Jobs;

use App\Models\JobSeeker;
use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegistrationMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $jobSeeker;

    /**
     * Create a new job instance.
     */
    public function __construct(JobSeeker $jobSeeker)
    {
        $this->jobSeeker = $jobSeeker;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->jobSeeker->email)->send(new WelcomeMail($this->jobSeeker));
    }
}
