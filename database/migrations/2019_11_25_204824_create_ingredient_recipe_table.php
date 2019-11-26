<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ingredient_amount');
            $table->bigInteger('ingredient_id')->unsigned();
            $table->bigInteger('recipe_id')->unsigned();
            $table->timestamps();

            $table->foreign('ingredient_id')->references('id')->on('ingredient');
            $table->foreign('recipe_id')->references('id')->on('recipe');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recipe');
    }
}
