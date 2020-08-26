<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConfirmPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $investment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $investment)
    {
        $this->user = $user;
        $this->investment = $investment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        $investment = $this->investment;
        $data = [
            'name'=> $user->name,
            'investment_id'=> $investment->investment_id,
            'url'=> url('/investments'),
        ];

        $mailer->send('email.confirm_payment', ['data' => $data], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Better9ja: Payment Confirmed');
        });

        $mailer->send('email.confirm_payment', ['data' => $data], function ($message) use ($investment) {
            $message->to($investment->user->email, $investment->user->name)->subject('Better9ja: Payment Confirmed');
        });
    }
}
