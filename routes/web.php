<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Login\LoginMasters;

use App\Http\Controllers\Login\Otp_verfication;

use  App\Http\Controllers\TransactionMaster\TransMaster;

use App\Http\Controllers\BookingLoad\BookingMaster;



use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('admin-master.login');
});


#LoginRegisteration


Route::post('/loginRegisteration',[LoginMasters::class,'RegisterationLoad'])->name('loginRegisteration');


Route::get('/login',function(){
    return view('admin-master.login');
});


if (Session::has('user_id')) {

    
Route::get('/getotp',[Otp_verfication::class,'verificationOTP'])->name('getotp');
    // do something


    Route::get('/transaction_master',[TransMaster::class,'indexMaster']);
}

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

    


#Transaction Master

Route::post('/transactionData', [TransMaster::class,'Trsload'])->name('transactionData');


#Email Master

use  App\Http\Controllers\MailMaster\EmailLoadMaster;

Route::get('/EmailMaster', [EmailLoadMaster::class, 'EmailIndex'])->name('EmailMaster');


// use App\Services\WhatsAppService;

// Route::get('/send-whatsapp', function () {
//     $whatsapp = new WhatsAppService();
//     $response = $whatsapp->sendTextMessage('918489852162', 'Hello! Direct from route.');
//     return $response;
// });


use App\Http\Controllers\WhatsAppController;

Route::get('/send-whatsapp', [WhatsAppController::class, 'send']);

//two-step-verification



Route::post('/postotp',[Otp_verfication::class,'verficationmaster'])->name('postotp');


// dd(app(\Illuminate\Contracts\Http\Kernel::class));


//Booking Master

Route::get('/BookingMaster',[BookingMaster::class,'index'])->name('BookingMaster');

Route::post('/BookingMasterload',[BookingMaster::class,'bookingData'])->name('BookingMasterload');


use App\Http\Controllers\EmailMigration\EmailMaster;

Route::get('/Email_index',[EmailMaster::class,'index'])->name('Email_index');




