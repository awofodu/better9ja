<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InvUploadProofSuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $withdrawal;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $withdrawal)
    {
        $this->user = $user;
        $this->withdrawal = $withdrawal;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        $withdrawal = $this->withdrawal;
        $data = [
            'name'=> $withdrawal->user->name,
            'investor'=> $user->name,
            'Withdrawal_id'=> $withdrawal->investment_id,
            'url'=> url('/withdrawals'),
        ];

        $mailer->send('email.investment_upload_success', ['data' => $data], function ($message) use ($withdrawal) {
            $message->to($withdrawal->user->email, $withdrawal->user->name)->subject('Better9ja: Proof Payment Upload');
        });
    }
}
