<?php
# @Date:   2019-10-29T15:07:51+00:00
# @Last modified time: 2019-11-04T23:14:17+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
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
        Schema::dropIfExists('foods');
    }
}
