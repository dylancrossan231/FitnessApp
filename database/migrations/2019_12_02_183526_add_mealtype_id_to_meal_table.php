<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMealtypeIdToMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meal', function (Blueprint $table) {
            $table->dropColumn('mealtype');
            $table->bigInteger('mealtype_id')->unsigned();
            $table->foreign('mealtype_id')->references('id')->on('mealType');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meal', function (Blueprint $table) {
                $table->dropForeign(['mealtype_id']);
                $table->dropColumn('mealtype_id');
                $table->string('meal_type');
            });
    }
}
