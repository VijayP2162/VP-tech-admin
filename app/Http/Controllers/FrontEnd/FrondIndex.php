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

// Full date and time

use Illuminate\Support\Facades\Auth;

class FrondIndex extends Controller
{
    public function FrondEndDataload()
    {
        $check_user = "";

        $Master_product_data = EcommerceModel::where('product_status', 1)->get();

        return view('Front-End.index', compact('Master_product_data', 'check_user'));
    }

    public function UserRegisration(Request $request)
    {

        // dd($request->all());

        $user_registration_data = BuyUserRegister::create([
            "usernmae" => $request->usernmae,
            "email" => $request->useremail,
            "password" => bcrypt($request->passsword),
            "mobile" => $request->usermobile,
            "user_status" => 1,
        ]);

    }


    public function Buyuserlogincredentails(Request $request)
    {
        $request->validate([
            'useremail' => 'required|email',
            'password' => 'required',
        ]);

        $check_user = BuyUserRegister::where('email', $request->useremail)->first();

        if (!$check_user) {
            return back()->withErrors(['login' => 'User not found.']);
        }

        if (!Hash::check($request->password, $check_user->password)) {
            return back()->withErrors(['login' => 'Incorrect password.']);
        }


        $request->session()->regenerate();

        $Master_product_data = EcommerceModel::where('product_status', 1)->get();

        return view('Front-End.index', compact('Master_product_data', 'check_user'));



    }


    public function TempProductLoad(Request $request, $id, $userid)
    {
        $product_data = EcommerceModel::find($id);
        $userdata = BuyUserRegister::find($userid);

        $order_code = "ORD-" . mt_rand(1000, 9999);

        $TempProductData = TempProductStore::create([
            "client_id" => $userid,
            "email" => $userdata->email,
            "product_id" => $id,
            "quantity" => 1,
            "act_price" => $product_data->product_price,
            "total_price" => $product_data->product_total_amount,
            "confirmation_status" => 1,
            "product_status" => 1,
            "product_name" => $product_data->product_name,
            "Delivery_amount" => $product_data->product_delivery_amount,
            "Paid_status" => 1,
            'order_code' => $order_code

        ]);

        $productList = TempProductStore::where('client_id', $request->userid)->get();

        $final_total_calc = $productList->sum('total_price');
        $final_pro_count = $productList->count('client_id', $request->userid);
        $final_client_id = $productList->find($request->userid);

        $load_Client_id = $request->userid;

        return view('Front-End.order-list', compact('productList', 'final_total_calc', 'final_pro_count', 'final_client_id', 'load_Client_id'));

    }

    public function qtyload(Request $request)
    {
        $quantity = $request->input('qty');
        $product_id = $request->input('product_id');
        $update_total_amt = $request->input('update_total_amt');

        $product = TempProductStore::findOrFail($product_id);

        $product->update([
            'quantity' => $quantity,
            'total_price' => $update_total_amt
        ]);

        return response()->json(['message' => 'Quantity updated successfully']);
    }

    public function deleteProductCard(Request $request, $id)
    {
        $product = TempProductStore::findOrFail($id);
        $product->delete();

        // Optionally, you can return a response
        // return response()->json(['message' => 'Product removed from cart successfully.']);
    }

    public function InvoiceDataload(Request $request, $id)
    {
        $productList = TempProductStore::where('client_id', $request->id)->get();

        $invoice_user = BuyUserRegister::find($id);




        $final_total_calc = $productList::where('confirmation_status', 1)
            ->sum('total_price');

        $final_pro_count = $productList->count('client_id', $request->userid);
        $final_client_id = $productList->find($request->userid);

        return view('Front-End.Invoice_view', compact('productList', 'final_total_calc', 'final_pro_count', 'final_client_id', 'invoice_user'));

    }

    public function OrderConfirmationMaster(Request $request)
    {
        // dd($request->all());
        $order_code = "ORD-" . mt_rand(1000, 9999);

        // FIXED: removed extra $ sign
        $userdata = BuyUserRegister::find($request->client_id);

        $Order_data = OrderConfirmation::create([
            'ordercode' => $order_code,
            'client_id' => $request->client_id,
            'name' => $request->ordercusname,
            'mail' => $userdata->email,
            'mobile' => $request->mobile,
            'door' => $request->doorno,
            'street' => $request->Street,
            'village_city' => $request->village_city,
            'distict' => $request->Distict,
            'postal_area' => $request->postal_area,
            'postal_code' => $request->pincode,
            'confirmation_status' => 1,
            'verification_status' => 1
        ]);

        $currentDate = Carbon::now()->toDateString(); // This can stay

        $product_count = TempProductStore::where([
            ['client_id', '=', $request->client_id],
            ['Paid_status', '=', 1],
        ])->count();

        $product_amount = TempProductStore::where([
            ['client_id', '=', $request->client_id],
            ['Paid_status', '=', 1],
        ])->sum('total_price'); // <-- replace 'amount' with your actual column



        $get_order_cus = OrderConfirmation::where([
            ['client_id', '=', $request->client_id],
            ['confirmation_status', '=', 1],
        ])->first();
        return view('Front-End.Delivery_status', compact('get_order_cus', 'product_count', 'product_amount'));


    }


    public function BookingOrderList()
    {
        
    }







    //
}
// bcrypt