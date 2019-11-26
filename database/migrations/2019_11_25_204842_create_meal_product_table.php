<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('meal_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();
            $table->integer('food_amount');
            $table->timestamps();

            $table->foreign('meal_id')->references('id')->on('meal');
            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_product');
    }
}
