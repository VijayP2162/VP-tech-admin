<?php


// File: app/Http/Controllers/Login/LoginMasterController.php

namespace App\Http\Controllers\Login;

use App\Models\AdminMaster\LoginMaster;
use App\Models\AdminMaster\ActiveMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Hash;

class LoginMasters extends Controller
{
    public function RegisterationLoad(Request $request)
    {
        // dd($request->all());

        if ($request->password == $request->confirmpass) {
            $credentialsData = LoginMaster::create([

                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'role' => 1

            ]);
        }

        return view('admin-master.index')->with('success', 'User registered successfully!');
    }

    public function credentails(Request $request)
    {
        $first_step = LoginMaster::where('email', $request->email)->first();
 
        if ($first_step && Hash::check($request->password, $first_step->password)) {
            Session::put('user_id', $first_step->id);

            $active_user_insert = ActiveMaster::create([
                'email' => $first_step->email,
                'username' => $first_step->username,
                'active_status' => $first_step->id, 
            ]);

            return view('admin-master.dashboard');
        } else {
            return view('admin-master.login');
        }
    }

    public function regiserationlistmaster()
    {

        $Registeration_List = LoginMaster::where('role', 1)->paginate(10);

        $Registeration_List_count = LoginMaster::where('role', 1)->count();

        return view('admin-master.registerationlist', compact('Registeration_List', 'Registeration_List_count'));
    }

    public function activeuserload()
    {
     $active_user_load = ActiveMaster::orderBy('id', 'desc')->paginate(10);


        return view('admin-master.active-user-master',compact('active_user_load'));
    }
}
