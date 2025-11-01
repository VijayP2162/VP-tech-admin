<?php

namespace App\Http\Controllers\TransactionMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TransactionMaster\TransaLoad;

class TransMaster extends Controller
{
    //

    public function indexMaster()
    {
       $MasterData = TransaLoad::where('verification_status', 1)->get(); 

        return view('admin-master.transaction_master', ['MasterData' => $MasterData]);
    }

    public function Trsload(Request $request)
    {
        $RandomID = substr(($request->username), 0, 2);

        $transactionData = TransaLoad::create([
            'user_name' => $request->username,
            'user_email' => $request->useremail,
            'user_id' => $request->user_id,
            'total_amount' => $request->transaction_amount,
            'transaction_id' => $RandomID . $request->username,
            'transaction_balance_amount' => $request->transaction_amount,
            'transaction_amount' => $request->transaction_amount,
            'transaction_type' => $request->transaction_type
        ]);

        $MasterData = TransaLoad::where('verification_status', 1)->get(); 

        return view('admin-master.transaction_master', ['MasterData' => $MasterData]);
    }
}
