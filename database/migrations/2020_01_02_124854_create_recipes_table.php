<?php
# @Author: izzy
# @Date:   2020-01-02T12:48:54+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:37:35+00:00




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
            $table->decimal('amount', 4, 2);
            $table->integer('portions');
            $table->timestamps();
            $table->bigInteger('user_id')->nullable()->unsigned();

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
        Schema::dropIfExists('recipes');
    }
}
