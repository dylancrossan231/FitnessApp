<?php
# @Author: izzy
# @Date:   2020-01-02T13:36:41+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T13:36:54+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->date('date');
          $table->time('time');
          $table->bigInteger('user_id')->unsigned();
          $table->bigInteger('meal_type_id')->unsigned();
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('meal_type_id')->references('id')->on('meal_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
