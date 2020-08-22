<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->string('user_type')->default(1);
            $table->boolean('is_guider')->default(0);
            $table->boolean('is_activated')->default(0);
            $table->boolean('is_confirmed')->default(0);
            $table->boolean('is_blocked')->default(0);
            $table->string('referred_by')->nullable();
            $table->float('minimum_investment' , 20 , 2)->unsigned()->default(5000);
            $table->float('maximum_investment' , 20 , 2)->unsigned()->default(500000);
            $table->string('referral_id')->nullable();
            $table->string('guider_id')->nullable();
            $table->string('support_pin')->nullable();
            $table->longText('proof_document')->nullable();
            $table->longText('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
