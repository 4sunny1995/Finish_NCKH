<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Customers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        $limit=30;
        for($i=1;$i<=$limit;$i++){
            DB::table('customers')->insert([
                'address'=>$faker->address,
                'phone'=>$faker->phoneNumber,
                'userid'=>$i,
                'created_at'=>$faker->dateTime,
            ]);
        }
    }
}
