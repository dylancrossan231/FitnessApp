<?php
# @Author: izzy
# @Date:   2020-01-02T14:01:43+00:00
# @Last modified by:   izzy
# @Last modified time: 2020-01-06T05:23:44+00:00




use Illuminate\Database\Seeder;
use App\Weight;

class WeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weight = new Weight();

        $weight->date = '2019-11-07';
        $weight->value = '68.7';
        $weight->user_id = 1;
        
        $weight->save();
    }
}
