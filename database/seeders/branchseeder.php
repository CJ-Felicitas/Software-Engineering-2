<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class branchseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('branch')->insert([
            [
                'branch_name' => 'Tagum City',
                'phone' => 435394853,
                'email' => 'protechtagum@email.com',
                'street' => 'magsaysay',
                'city' => 'Tagum',
                'zip_code' => '8100'
            ]

        ]);
    }
}
