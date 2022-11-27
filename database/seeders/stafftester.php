<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class stafftester extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            [
                'staff_id' => 1000,
                'first_name' => 'Mark Jerome',
                'last_name' => 'Pondol',
                'email' => 'mjp@usep.edu.ph',
                'phone' => 87865578,
                'branch_id' => '10001',
                'position_name' => 'Admin', 
                'username' => 'Mark',
                'password' => Hash::make('admin')
            ],
            [
                'staff_id' => 1001,
                'first_name' => 'Kiara Ysabelle',
                'last_name' => 'Hagunob',
                'email' => 'kiaraysabelle@usep.edu.ph',
                'phone' => 87865579,
                'branch_id' => '10001',
                'position_name' => 'Admin',
                'username' => 'Kiara',
                'password' => Hash::make('admin')
            ],
            [
                'staff_id' => 1002,
                'first_name' => 'Marlo',
                'last_name' => 'Barua',
                'branch_id' => '10001',
                'email' => 'marlobarua@usep.edu.ph',
                'phone' => 87865571,
                'position_name' => 'Admin',
                'username' => 'Marlo',
                'password' => Hash::make('admin')
            ],
            [
                'staff_id' => 1003,
                'first_name' => 'Staff',
                'last_name' => 'Test',
                'branch_id' => '10001',
                'email' => 'staff@usep.edu.ph',
                'phone' => 87865576,
                'position_name' => 'Staff',
                'username' => 'staff',
                'password' => Hash::make('staff')
            ],
            [
                'staff_id' => 1004,
                'first_name' => 'Admin',
                'last_name' => 'Test',
                'branch_id' => '10001',
                'email' => 'staff@usep.edu.ph',
                'phone' => 87865576,
                'position_name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin')
            ]

        ]);
    }
}
