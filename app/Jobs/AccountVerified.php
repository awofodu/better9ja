<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AccountVerified implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $admin;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $admin)
    {
        $this->user = $user;
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        $admin = $this->admin;
        $data = [
            'name' => ucwords($user->name),
            'url'=> url('/investments'),
            'admin_name' => $admin->name,
        ];

        $mailer->send('email.account_activated', ['data' => $data], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Better9ja: Account Activated');
        });

        $mailer->send('email.admin_account_activated', ['data' => $data], function ($message) use ($admin) {
            $message->to('bayolarry02@gmail.com', $admin->name)->subject('Better9ja: Account Activated');
        });

    }
}
