<?php
# @Date:   2019-10-29T14:03:53+00:00
# @Last modified time: 2020-01-06T05:34:51+00:00




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
        $this->call(MealTypesTableSeeder::class);
        

    }
}
