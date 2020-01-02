<?php
# @Author: izzy
# @Date:   2020-01-02T13:40:52+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T13:41:42+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ingredient_amount');
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredients');
    }
}
