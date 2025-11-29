<?php

namespace App\Http\Controllers\MailMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailLoadMaster extends Controller
{
    //

    public function EmailIndex()
    {
        return view('admin-master.Email.Email_Master_view');
    }
}
