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
            $table->unsignedBigInteger('balance')->default(0);
            $table->unsignedBigInteger('lifetime_topup')->default(0);
            $table->unsignedBigInteger('role_id')->default(1);
            $table->unsignedBigInteger('tier_id')->default(1);
            $table->integer('fame')->default(0);
            $table->unsignedInteger('free_recipes_count')->default(0);
            $table->unsignedInteger('paid_recipes_count')->default(0);

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
