<?php
# @Author: izzy
# @Date:   2020-01-02T12:48:54+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T13:11:15+00:00




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
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('api_id');
            $table->integer('grams');
            $table->integer('energykj');
            $table->integer('energykcals');
            $table->string('protein');
            $table->string('carbohydrates');
            $table->string('sugars');
            $table->string('fats');
            $table->string('saturatedfat');
            $table->string('fiber');
            $table->string('unit');
            $table->integer('amount');
            $table->integer('portions');

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
        Schema::dropIfExists('recipes');
    }
}
