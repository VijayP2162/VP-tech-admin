<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\AdminMaster\LoginMaster;
use Illuminate\Http\Request;

class Otp_verfication extends Controller
{
    //

    public function verificationOTP()
    {
        return view('admin-master.otp_api');
    }

   public function verficationmaster(Request $request)
{
    // Validate OTP input
    $request->validate([
        'two_step_otp' => 'required|numeric',
    ]);

    // Get first OTP for role=1
    $otp = LoginMaster::where('email', session('email'))->first();

    if ($otp && $request->two_step_otp == $otp->otp_val) {
        // OTP matched
        return view('admin-master.dashboard');
            
    } else {
        // OTP invalid
        return redirect()->route('getotp')
            ->with('error', 'Invalid OTP. Please try again.');
    }
}


}
