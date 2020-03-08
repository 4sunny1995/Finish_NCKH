<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Topics extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit=50;
        for($i=1;$i<=$limit;$i++){
            DB::table('topics')->insert([
                'threadname'=>$faker->randomElement(['Tiền điện ','Nghiên cứu ','Xây dựng ','Chế tạo ']).str_random(100),
                'species'=>$faker->randomElement([11,12,13,14]),
                'point'=>$faker->randomElement([11,12,13,14]),
                'userid'=>rand(1,50),
                'created_at'=> Carbon::now(),
                'describe'=> str_random(100),
                'status'=>$faker->randomElement([10,11]),
                'dateOfAccept'=> Carbon::now()
            ]);
        }
    }
}
