<?php

namespace App\Http\Controllers\MailMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\EmailLoaD\MasterMailLoad;

class EmailLoadMaster extends Controller
{
    //

    public function EmailIndex()
    {
        return view('admin-master.Email.Email_Master_view');
    }
   public function sendMail(Request $request)
{
    dd($request->all());
}

}
