<?php
# @Author: izzy
# @Date:   2019-12-03T11:51:49+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-02T14:05:30+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('country');
            $table->decimal('start_weight', 3, 1);
            $table->decimal('goal_weight', 3, 1);
            $table->decimal('activity_level', 2, 1);
            $table->string('profile_info');
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
        Schema::dropIfExists('users');
    }
}
