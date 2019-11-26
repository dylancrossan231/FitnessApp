<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingredient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('ingredient', function (Blueprint $table) {
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
        //
    }
}
