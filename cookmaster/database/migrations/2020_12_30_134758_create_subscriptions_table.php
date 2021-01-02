<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('chef_id');
            $table->unsignedBigInteger('member_id');
            $table->datetime('start');
            $table->integer('duration');
            $table->datetime('end');

            $table->primary('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('chef_id')->references('id')->on('users');
            $table->foreign('member_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
