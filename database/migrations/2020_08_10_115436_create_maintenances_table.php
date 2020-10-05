<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('maintenance_id')->nullable();
            $table->float('charge' , 20 , 2)->unsigned()->default(0);
            $table->float('amount' , 20 , 2)->unsigned()->default(0);
            $table->string('next_level')->default(6);
            $table->longText('proof_document')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->float('main_merge_balance' , 20 , 2)->unsigned()->default(0);
            $table->string('date')->nullable();
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
        Schema::dropIfExists('maintenances');
    }
}
