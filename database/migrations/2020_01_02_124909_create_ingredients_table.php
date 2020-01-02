<?php
# @Author: izzy
# @Date:   2020-01-02T12:49:09+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T13:11:52+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('api_id');
            $table->string('unit');
            $table->integer('energy_kj');
            $table->integer('energy_kcal');
            $table->string('protein');
            $table->string('carbs');
            $table->string('sugar');
            $table->string('fat');
            $table->string('saturated_fat');
            $table->string('fiber');
            $table->boolean('is_product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
