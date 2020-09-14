<?php

namespace App\Console\Commands;

use App\Merge;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TerminateMergeTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'terminate:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
       $merges = Merge::where('is_paid', 0)->where('is_resolved', 0)->get();
       foreach($merges as $merge)
       {
           if(Carbon::now() >= Carbon::parse($merge->created_at)->addHours(24))
           {
               if($merge->is_terminated == 0)
               {
                   if($merge->investor)
                   {
                       $merge->investor->user->is_blocked = 1;
                       $merge->investor->user->save();

                       //Revert price for the investor paying
                       $investor = $merge->investor;
                       $investor->inv_merge_balance = $investor->inv_merge_balance + $merge->amount;
                       $investor->save();
                   }


                   if($merge->maintenance_investor)
                   {
                       $merge->maintenance_investor->user->is_blocked = 1;
                       $merge->maintenance_investor->user->save();

                       //Revert price for the investor paying
                       $investor = $merge->maintenance_investor;
                       $investor->inv_merge_balance = $investor->main_merge_balance + $merge->amount;
                       $investor->save();
                   }


                   if($merge->withdrawal)
                   {
                       // Revert price for the investor withdrawing
                       $withdrawal = $merge->withdrawal;
                       $withdrawal->merge_balance = $withdrawal->merge_balance + $merge->amount;
                       $withdrawal->save();
                   }


                   if($merge->referral_withdrawal)
                   {
                       // Revert price for the investor withdrawing referral bonus
                       $withdrawal = $merge->referral_withdrawal;
                       $withdrawal->merge_balance = $withdrawal->merge_balance + $merge->amount;
                       $withdrawal->save();
                   }

                   $merge->is_terminated = 1;
                   $merge->save();
               }
           }
       }

    }
}
