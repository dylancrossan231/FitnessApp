<?php
# @Author: izzy
# @Date:   2020-01-02T12:47:36+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T14:04:44+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->date('date');
          $table->decimal('value', 3, 1);
          $table->bigInteger('user_id')->unsigned();
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weights');
    }
}
