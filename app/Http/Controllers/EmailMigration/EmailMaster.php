<?php

namespace App\Http\Controllers\EmailMigration;

use App\Http\Controllers\Controller;
 
use App\Models\AdminMaster\LoginMaster;
use Illuminate\Http\Request;

class EmailMaster extends Controller
{
    //

    public function index()
    {

        $email_list=LoginMaster::where('role',1)->get();
        return view('emails.email-migration',['email_list'=>$email_list]);
    }
    
}
