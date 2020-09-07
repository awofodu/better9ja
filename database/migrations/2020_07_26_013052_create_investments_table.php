<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('investment_id')->nullable();
            $table->float('amount' , 20 , 2)->unsigned()->default(0);
            $table->float('inv_merge_balance' , 20 , 2)->unsigned()->default(0);
            $table->float('inv_paid_amount' , 20 , 2)->unsigned()->default(0);
            $table->float('reward' , 20 , 2)->unsigned()->default(0);
            $table->boolean('is_paid')->default(0);
            $table->string('withdrawal_date')->nullable();
            $table->boolean('is_withdrawn')->default(0);
            $table->float('paid_amount' , 20 , 2)->unsigned()->default(0);
            $table->float('balance' , 20 , 2)->unsigned()->default(0);
            $table->float('merge_balance' , 20 , 2)->unsigned()->default(0);
            $table->longText('proof_document')->nullable();
            $table->boolean('is_recommitted')->default(0);
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
        Schema::dropIfExists('investments');
    }
}
