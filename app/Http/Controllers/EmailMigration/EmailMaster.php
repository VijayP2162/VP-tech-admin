<?php

namespace App\Http\Controllers\EmailMigration;

use App\Http\Controllers\Controller;
use App\Models\AdminMaster\LoginMaster;
use Illuminate\Http\Request;
use App\Models\EmailLoaD\MasterMailLoad;
use Barryvdh\DomPDF\Facade\Pdf;   // ✔ Correct import

class EmailMaster extends Controller
{
    public function index()
    {
        $email_list = LoginMaster::where('role', 1)->get();
        return view('emails.email-migration', ['email_list' => $email_list]);
    }

    public function sendMail(Request $request)
    {
        $toEmails = implode(',', $request->to_mail ?? []);
        $ccEmails = implode(',', $request->chcc_mail ?? []);

        $mail_master = MasterMailLoad::create([
            'send_email' => $request->send_mail,
            'to_email' => $toEmails,
            'cc_mail' => $ccEmails,
            'message' => $request->message_data ?? '',
            'view_notification' => 1,
            'priority_val' => $request->Priority ?? '',
            'delivery_date' => now()->toDateString(),
            'verification_status' => 1,
        ]);

        return response()->json(['result' => 'success']);
    }

    public function inboxemail()
    {
        $inbox_message = MasterMailLoad::where('verification_status', 1)->get();

        return view('emails.email-inbox', ['inbox_message' => $inbox_message]);
    }

    public function downloadInvoice()
    {
        $data = [
            'name' => 'Arun Kumar',
            'amount' => 1500
        ];

        // ✔ Correct Facade usage
        $pdf = Pdf::loadView('invoice', $data);

        return $pdf->download('invoice.pdf');
    }
}
