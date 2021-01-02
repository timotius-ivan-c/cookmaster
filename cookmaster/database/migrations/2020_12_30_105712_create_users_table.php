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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_post_date')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->unsignedBigInteger('balance');
            $table->unsignedBigInteger('lifetime_topup');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('tier_id');
            $table->integer('fame');
            $table->unsignedInteger('free_recipes_count');
            $table->unsignedInteger('paid_recipes_count');

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('tier_id')->references('id')->on('tiers');
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
