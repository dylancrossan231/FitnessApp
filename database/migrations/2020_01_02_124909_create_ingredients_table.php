<?php
# @Author: izzy
# @Date:   2020-01-02T12:49:09+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:37:27+00:00




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
            $table->integer('api_id')->nullable();
            $table->string('unit');
            $table->decimal('energy_kj', 4, 1);
            $table->decimal('energy_kcal', 4, 1);
            $table->decimal('protein', 4, 1);
            $table->decimal('carbs', 4, 1);
            $table->decimal('sugar', 4, 1);
            $table->decimal('fat', 4, 1);
            $table->decimal('saturated_fat', 4, 1);
            $table->decimal('fiber', 4, 1);
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
