<?php
use App\Weight;
use Illuminate\Database\Seeder;

class WeightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weight = new Weight();
        $weight->weight = '60kg';
        $weight->save();

        
    }
}
