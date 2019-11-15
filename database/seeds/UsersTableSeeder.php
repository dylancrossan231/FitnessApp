<?php
# @Date:   2019-11-04T15:48:40+00:00
# @Last modified time: 2019-11-04T19:28:40+00:00




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
      $user->name = 'dylan user';
      $user->email = 'dylancrossan12@hotmail.com';
      $user->password =bcrypt('secret123');
      $user->save();
 

    }
}
