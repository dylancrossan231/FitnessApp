<?php
# @Date:   2019-11-04T15:48:40+00:00
# @Last modified time: 2020-01-02T13:59:11+00:00




use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->username = 'dylan_user';
      $user->email = 'dylancrossan12@hotmail.com';
      $user->password = bcrypt('secret123');
      $user->name = 'Dylan Stupid';
      $user->dob = '1998-12-20';
      $user->gender = 'male';
      $user->country = 'Ireland';
      $user->start_weight = 120;
      $user->goal_weight = 70;
      $user->activity_level = '1.8';
      $user->profile_info = 'Hi. I\'m fat and I wanna lose weight lol.';
      $user->save();


    }
}
