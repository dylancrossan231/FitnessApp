<?php
# @Author: izzy
# @Date:   2020-01-02T13:38:57+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T13:39:30+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('portion');
            $table->bigInteger('recipe_id')->unsigned();
            $table->bigInteger('meal_id')->unsigned();
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on('recipes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('meal_id')->references('id')->on('meals')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_recipes');
    }
}
