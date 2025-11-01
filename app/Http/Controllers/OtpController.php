<?php


// app/Http/Controllers/OtpController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $otp = rand(100000, 999999);
        $email = $request->email;

        // Store OTP in DB
        DB::table('email_otps')->updateOrInsert(
            ['email' => $email],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(5),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        // Send OTP Mail
        Mail::to($email)->send(new SendOtpMail($otp));

        return response()->json(['message' => 'OTP sent to your email.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $record = DB::table('email_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$record) {
            return response()->json(['message' => 'Invalid or expired OTP.'], 400);
        }

        // You can now mark the user as verified or logged in

        // Optionally, delete OTP
        DB::table('email_otps')->where('email', $request->email)->delete();

        return response()->json(['message' => 'OTP Verified Successfully!']);
    }
}
