<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMergesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('withdrawal_id')->nullable();
            $table->unsignedBigInteger('investment_id')->nullable();
            $table->unsignedBigInteger('maintenance_id')->nullable();
            $table->unsignedBigInteger('referral_id')->nullable();
            $table->float('amount' , 20 , 2)->unsigned()->default(0);
            $table->boolean('is_paid')->default(0);
            $table->longText('proof_document')->nullable();
            $table->boolean('is_terminated')->default(0);
            $table->boolean('is_resolved')->default(0);
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
        Schema::dropIfExists('merges');
    }
}
