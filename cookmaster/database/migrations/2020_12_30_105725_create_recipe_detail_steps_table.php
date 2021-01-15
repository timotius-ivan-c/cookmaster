<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeDetailStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_detail_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('step_no');
            $table->timestamps();
            $table->unsignedBigInteger('recipe_id');
            $table->longText('text');
            $table->string('image');

            $table->foreign('recipe_id')->references('id')->on('recipes');
            // $table->primary(['step_no', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_detail_steps');
    }
}
