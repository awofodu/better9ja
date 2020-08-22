<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('referral_id')->nullable();
            $table->float('bonus' , 20 , 2)->unsigned()->default(0);
            $table->float('amount' , 20 , 2)->unsigned()->default(0);
            $table->boolean('is_withdrawn')->default(0);
            $table->float('paid_amount' , 20 , 2)->unsigned()->default(0);
            $table->float('balance' , 20 , 2)->unsigned()->default(0);
            $table->float('merge_balance' , 20 , 2)->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referrals');
    }
}