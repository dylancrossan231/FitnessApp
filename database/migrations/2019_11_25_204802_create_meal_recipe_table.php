<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('portion');
            $table->bigInteger('meal_id')->unsigned();
            $table->bigInteger('recipe_id')->unsigned();
            $table->timestamps();

            $table->foreign('meal_id')->references('id')->on('meals');
            $table->foreign('recipe_id')->references('id')->on('recipes');
            
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_recipe');
    }
}

