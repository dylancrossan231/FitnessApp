<?php
# @Date:   2019-10-29T14:03:53+00:00
# @Last modified time: 2019-11-04T23:21:25+00:00



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
        $this->call(FoodsTableSeeder::class);
    }
}
