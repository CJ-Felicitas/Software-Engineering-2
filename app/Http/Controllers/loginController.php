<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    function login(Request $request)
    {
        $user = DB::table('staffs')->where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password) || !($user->position_name === $request->role)) {
            return back()->with('error', 'Invalid Credentials');
        } else {
            if ($request->role == 'Staff') {
                $request->session()->put('staff', $user);
                $request->session()->put('staff_id', $user->staff_id);
                $request->session()->put('branch_id', $user->branch_id);
                return redirect('/staffdashboard');
            } elseif ($request->role == 'Admin') {
                $request->session()->put('admin', $user);
                return redirect('/staffmanagement');
            } elseif ($request->role == 'NewEmployee') {
                return redirect('/newemp');
            }
        }
    }


    function changePW(Request $req)
    {
        $user = DB::table('staffs')->where('first_name', $req->fname)->first();
        if (!$user || $user->password != null) {


            if (!$user) {
                return back()->with('nousers', 'There are no users for this input');
            }
            if ($user->password != null) {
                return back()->with('exist', 'User has been already registered');
            }
        } else {
            $ufname = $user->first_name;
            $ulname = $user->last_name;
            $uemail = $user->email;
            $uphone = $user->phone;
            $ubranch = $user->branch_id;
            $upos = $user->position_name;
            DB::table('staffs')->where('first_name', $req->fname)->delete();

            DB::table('staffs')->insert([
                'first_name' => $ufname,
                'last_name' => $ulname,
                'email' => $uemail,
                'phone' => $uphone,
                'branch_id' => $ubranch,
                'position_name' => $upos,
                'username' => $req->username,
                'password' => Hash::make($req->password)
            ]);
        }


        return redirect('/')->with('welcome', 'Username and password set you may now login');
    }
}
