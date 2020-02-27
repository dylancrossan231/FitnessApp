<?php
# @Author: izzy
# @Date:   2020-01-02T13:40:52+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:38:14+00:00




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
            $table->decimal('ingredient_amount', 6, 2);
            $table->bigInteger('ingredient_id')->unsigned();
            $table->bigInteger('recipe_id')->unsigned();
            $table->timestamps();

            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onUpdate('cascade')->onDelete('cascade');
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
