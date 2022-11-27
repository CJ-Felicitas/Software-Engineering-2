<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class crud extends Controller
{
    function edit(Request $req)
    {
        DB::table('staffs')
            ->where('staff_id', $req->find_id)
            ->update(
                ['first_name' => $req->first_name, 'last_name' => $req->last_name, 'email' => $req->email, 'phone' => $req->phone, 'branch_id' => $req->branch_id, 'position_name' => $req->position_name]
            );
        return redirect('/staffmanagement');
    }
}
