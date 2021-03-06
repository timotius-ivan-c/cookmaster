<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeDetailIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_detail_ingredients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('recipe_id');
            $table->string('name');
            $table->string('amount')->nullable(true);
            $table->string('notes')->nullable(true);

            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_detail_ingredients');
    }
}
