<?php

namespace App\Jobs;

use App\Mail\ForgotPasswordMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

     public $email, $resetLink, $expiration;
     
    public function __construct($email, $resetLink, $expiration)
    {
        $this -> email = $email;
        $this->resetLink = $resetLink;
        $this->expiration = $expiration;
    }

    /**
     * Execute the job.
     */
     public function handle(): void
    {
        $userEmail = new ForgotPasswordMail($this->email);
        $userEmail->to($this->email);
        Mail::send($userEmail);
    }
}
