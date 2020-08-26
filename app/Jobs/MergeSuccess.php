<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MergeSuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $investment;
    protected $withdrawal;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($investment, $withdrawal)
    {
        $this->investment = $investment;
        $this->withdrawal = $withdrawal;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $investment = $this->investment;
        $withdrawal = $this->withdrawal;
        $data = [
            'investment_name' => ucwords($investment->name),
            'withdrawal_name' => ucwords($withdrawal->name),
            'url'=> url('/investments'),
            'withdrawal_url'=> url('/withdrawals'),
        ];

        $mailer->send('email.merge_success', ['data' => $data], function ($message) use ($investment) {
            $message->to($investment->email, $investment->name)->subject('Better9ja: Investment Merge Info');
        });

        $mailer->send('email.withdrawal_merge_success', ['data' => $data], function ($message) use ($withdrawal) {
            $message->to($withdrawal->email, $withdrawal->name)->subject('Better9ja: Withdrawal Merge Info');
        });
    }
}
