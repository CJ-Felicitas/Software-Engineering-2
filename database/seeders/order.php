<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
          
            'customer_id' => 90013,
            'order_date' =>  date("Y/m/d"),
            'branch_id' => 10001,
            'staff_id' => 1001

        ]);
    }
}
