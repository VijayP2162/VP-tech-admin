<?php

namespace App\Http\Controllers\InvoiceMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index()
    {
        return view('Invoice-master.Quatation_master');
    }
}
