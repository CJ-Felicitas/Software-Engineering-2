<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class stafftester2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            'first_name' => 'Juan Dela',
                'last_name' => 'Cruz',
                'email' => 'juan@usep.edu.ph',
                'phone' => 87865573,
                'position_name' => 'Staff',
                'username' => 'Juan',
                'password' => Hash::make('staff')
        ]);
    }
}
