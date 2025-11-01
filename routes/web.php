<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Login\LoginMasters;

use  App\Http\Controllers\TransactionMaster\TransMaster;

Route::get('/', function () {
    return view('admin-master.login');
});


#LoginRegisteration


Route::post('/loginRegisteration',[LoginMasters::class,'RegisterationLoad'])->name('loginRegisteration');


Route::get('/login',function(){
    return view('admin-master.login');
});

Route::post('/verfication',[LoginMasters::class,'credentails'])->name('verfication');

Route::get('/RegisterationMaster',function(){
    return view('admin-master.register');
});

use App\Http\Controllers\OtpController;

Route::post('/send-otp', [OtpController::class, 'sendOtp']);
Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);


Route::get('/otp',function(){
    return view('emails.otpgen');
});


Route::get('/registeration-list',[LoginMasters::class,'regiserationlistmaster'])->name('registeration-list');







Route::get('/active-user', [LoginMasters::class, 'activeuserload'])
    ->middleware('auth.custom') // 👈 new alias
    ->name('active-user');

    Route::get('/transaction_master',[TransMaster::class,'indexMaster']);


#Transaction Master

Route::post('/transactionData', [TransMaster::class,'Trsload'])->name('transactionData');


// dd(app(\Illuminate\Contracts\Http\Kernel::class));
