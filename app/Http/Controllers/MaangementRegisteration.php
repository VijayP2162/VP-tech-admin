<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagementReg;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class MaangementRegisteration extends Controller
{
    public function registration(Request $request)
    {
        // dd($request->all());

        $final_data = $request->validate([
            'username' => 'required|string|max:255|unique:adminmaster,username',
            'password' => 'required|max:200',
            'email' => 'required|email|unique:adminmaster,email',
            'conpassword' => 'required|max:200',
            'role' => 'required'
        ]);


        if ($request->input('password') == $request->input('conpassword')) {

            $final_data['password'] = bcrypt($final_data['password']);

            unset($final_data['conpassword']);

            ManagementReg::create($final_data);

            $get_data = ManagementReg::all();
            return view('login', compact('get_data'));


        } else {
           return view('/');
        }


    }
    public function editformdataload(Request $request, $id)
    {
        $data = ManagementReg::find($id);
        return view('Editable-form', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $updateformdata = $request->validate([
            'username' => 'required'
        ]);

        $data = ManagementReg::find($id);
        $data->update($updateformdata);
        $get_data = ManagementReg::all();
        return view('registration-table', compact('get_data'));
    }
    public function credentialverification(Request $request)
{
    // Validate input
    $credt_data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Find user by email
    $checkuser = ManagementReg::where('email', $credt_data['email'])->first();

   
    if ($checkuser && Hash::check($credt_data['password'], $checkuser->password)) {
        
        Auth::login($checkuser);

        
        $request->session()->regenerate();

        
        session()->put('role', $checkuser->role);

       
        session()->put('user_name', $checkuser->username);

        
        return view('dashboard', compact('checkuser'));
    } else {
        
        return redirect()->back()->with('error', 'Invalid email or password.');
    }
}




    public function masterdataload()
    {
        // $retrivemasterdata=ManagementReg::all();

        $retrivemasterdata = ManagementReg::orderby('id', 'desc')->paginate(10);



        return view('master-table', compact('retrivemasterdata'));

    }

    public function filterdataload(Request $request)
    {
        $query = ManagementReg::query();

        if ($request->filled('employee_email')) {
            $query->where('email', 'LIKE', '%' . $request->employee_email . '%');
        }

        $fetch_employee_list = $query->orderBy('id', 'desc')->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('Ajax.master_table_ajax_load', compact('fetch_employee_list'))->render()
            ]);
        }



        return view('master-table', compact('fetch_employee_list'));


    }







}