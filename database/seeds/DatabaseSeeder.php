<?php
# @Date:   2019-10-29T14:03:53+00:00
# @Last modified time: 2020-01-02T14:12:50+00:00


use App\User;
use App\Food;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(WeightsTableSeeder::class);

    }
}
