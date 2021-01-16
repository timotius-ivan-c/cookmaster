<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('author_id');
            $table->string('name');
            $table->string('image');
            $table->integer('review_count');
            $table->float('average_rating', 3, 2);
            $table->datetime('publish_date');
            $table->integer('recipe_type');
            $table->unsignedBigInteger('recipe_category_id');

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('recipe_category_id')->references('id')->on('recipe_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
