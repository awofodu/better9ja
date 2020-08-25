<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendVerificationLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $verifyUrl;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $verifyUrl)
    {
        $this->user = $user;
        $this->verifyUrl = $verifyUrl;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->user;
        $verifyUrl = $this->verifyUrl;

        (new MailMessage)
            ->subject('Welcome!')
            ->markdown('email.verify', ['name' => $user->name, 'url' => $verifyUrl]);
    }
}
