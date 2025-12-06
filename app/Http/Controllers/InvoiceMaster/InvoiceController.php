<?php

namespace App\Http\Controllers\InvoiceMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\InvoiceModel\Quatationload;

use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    //

    public function index()
    {
        return view('Invoice-master.Quatation_master');
    }

    public function quatationInsert(Request $request)
    {
        $validated = $request->validate([
            'service_provider' => 'required|integer|not_in:0',
            'duration_end_date' => 'required|date',
            'organization' => 'required|string|max:255',
            'quatation_id' => 'required|string|max:100',
            'service_periods' => 'nullable|integer',
        ]);

        $save = \App\Models\InvoiceModel\Quatationload::create([
            'quatation_id'       => $request->quatation_id,
            'service_provide'    => $request->service_provider,
            'end_date'           => $request->duration_end_date,
            'organization'       => $request->organization,
            'quatation_amount'   => $request->total_amout, // or calculate, because required in DB
            'quatation_status'   => 1,
            'verification_status' => 1,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $save
        ]);
    }

    public function Quatation_List()
    {

        $quatation_data = Quatationload::where('verification_status', 1)->get();
        return view('Invoice-master.Invoice_list_master', ['quatation_data' => $quatation_data]);
    }

    public function download_invoices($id)
    {
        $invoice_data = Quatationload::with('services')->findOrFail($id);
        $services = $invoice_data->services;

        // Debug: check services
        // dd($services);

        $data = [
            'organization' => $invoice_data->organization,
            'amount'       => $invoice_data->quatation_amount,
            'customer'     => $invoice_data->organization,
            'quotation_id' => $invoice_data->quatation_id,
            'services'     => $services
        ];

        $pdf = Pdf::loadView('invoice', $data);

        return $pdf->download('invoice_' . $invoice_data->id . '.pdf');
    }
}
