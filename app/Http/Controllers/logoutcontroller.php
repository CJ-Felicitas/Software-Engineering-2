<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutcontroller extends Controller
{
    function terminateSession(Request $request)
    {
        if ($request->session()->has('admin')) {
            $request->session()->forget('admin');
        } elseif ($request->session()->has('staff')) {
            $request->session()->forget('staff');
        }
        return view('/');
    }
}
