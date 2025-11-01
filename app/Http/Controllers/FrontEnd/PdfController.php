<?php



namespace App\Http\Controllers\FrontEnd;

use App\Models\FrontEnd\BuyUserRegister;
use App\Models\FrontEnd\TempProductStore;

use App\Http\Controllers\Controller;


use App\Models\FrontEnd\OrderConfirmation;

use App\Models\Ecommerce\EcommerceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


use PDF;  // import facade correctly

class PdfController extends Controller
{
    public function downloadPdf(Request $request, $id)
    {
        $To_address = OrderConfirmation::where('client_id', $id)->first();

        $temp_pro = TempProductStore::where([
            ['client_id', '=', $id],
            ['Paid_status', '=', 1]
        ])->get();



        if (!$To_address) {
            abort(404, 'Order not found.');
        }

        $product_count = TempProductStore::where([
            ['client_id', '=',$id],
            ['Paid_status', '=', 1],
        ])->count();

        $product_amount = TempProductStore::where([
            ['client_id', '=', $id],
            ['Paid_status', '=', 1],
        ])->sum('total_price');

         $product_del = TempProductStore::where([
            ['client_id', '=', $id],
            ['Paid_status', '=', 1],
        ])->sum('Delivery_amount');

        $pdf = PDF::loadView('pdf', compact('To_address', 'temp_pro','product_count','product_amount','product_del'));

        return $pdf->download('document.pdf');
    }

}

