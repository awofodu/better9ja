<?php

namespace App\Console\Commands;

use App\Investment;
use App\Referral;
use App\User;
use Illuminate\Console\Command;

class CalculateMaintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculate the maintenance price of all investors.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach($users as $user)
        {
            $ref = Referral::where('user_id', $user->id)->latest()->first();
            $prev_ref =  Referral::where('user_id', $user->id)->latest()->skip(1)->first();
            $ref_count = Referral::where('user_id', $user->id)->count();
            if($ref_count > 1)
            {
                if($ref->bonus > 4999)
                {
                    $maintenance = $user->maintenances()->latest()->first();
                    $maintenance->charge = round((int)$ref->bonus * (30/100)) + round((int)$maintenance->pending_amount * (30/100));
                    $maintenance->save();
                }else{
                    $maintenance = $user->maintenances()->latest()->first();
                    $maintenance->charge = round((int)$prev_ref->bonus * (30/100)) + round((int)$maintenance->pending_amount * (30/100));
                    $maintenance->save();
                }

            }else{
                if($ref->bonus > 4999)
                {
                    $maintenance = $user->maintenances()->latest()->first();
                    $maintenance->charge = round((int)$ref->bonus * (30/100)) + round((int)$maintenance->pending_amount * (30/100));
                    $maintenance->save();
                }else{
                    $last_investment = Investment::whereUserId($user->id)->latest()->first();
                    $maintenance = $user->maintenances()->latest()->first();
                    $maintenance->charge = $last_investment ? round((int)$last_investment->amount * (10/100)) + round((int)$maintenance->pending_amount * (30/100)) : 0;
                    $maintenance->save();
                }

            }

            echo 'done';
        }
    }
}
