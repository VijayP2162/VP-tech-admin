<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ManagementReg;

use App\Models\Ecommerce\EcommerceModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\FrontEnd\BuyUserRegisterModals;
use App\Models\FrontEnd\tempproductload;
use App\Models\FrontEnd\OrderConfirmation;
use Illuminate\Http\Request;

class BuyUserControl extends Controller
{
    public function buyUserReg(Request $request)
    {
        $request->validate([
            'buyusername' => 'required|max:255',
            'buyuseremail' => 'required|max:255',
            'buyuserpass' => 'required|max:255',
            'buyusermobile' => 'required|max:255',
        ]);

        // Manually map to DB column names
        $insert_data = BuyUserRegisterModals::create([
            'username' => $request->buyusername,
            'email' => $request->buyuseremail,
            'password' => bcrypt($request->buyuserpass),
            'mobile' => $request->buyusermobile
        ]);

        $Master_product_data = EcommerceModel::where('product_status', 1)->get();

        $checkuser = "";

        return view('Front-End.index', compact('Master_product_data', 'checkuser'));
    }

    public function buyUserlog(Request $request)
    {
        $request->validate([
            'buyuseremail' => 'required|email',
            'buyuserpass' => 'required',
        ]);

        $checkuser = BuyUserRegisterModals::where('email', $request->buyuseremail)->first();

        if ($checkuser && Hash::check($request->buyuserpass, $checkuser->password)) {
            Auth::login($checkuser); // EcommerceModel must extend Authenticatable
            $request->session()->regenerate();

            $Master_product_data = EcommerceModel::where('product_status', 1)->get();

            // ✅ This now passes the correct variable names to the view
            return view('Front-End.index', compact('Master_product_data', 'checkuser'));
        }

        return back()->withErrors([
            'login_error' => 'Invalid email or password.',
        ]);
    }

    public function addproductload(Request $request, $id, $email)
    {
        $user_data = ManagementReg::findOrFail($email);
        $product_data = EcommerceModel::findOrFail($id);
        

        $temp_product_data = tempproductload::create([
            "client_id" => $email,
            "email" => $user_data->email,
            "client_name"=>$user_data->username,        
            "product_name"=>$product_data->product_name,
            "product_quantity"=>1,
            "product_actual_price"=>$product_data->product_price,
            "product_total_price"=>100,
            "confirmation_status"=>1,
            "product_status"=>1,

        ]);
    }



     
        // $order_code='ORD-'.mt_rand(1000,9999);
        // $OrderCon=OrderConfirmation::create([
        //      'ordercode'=>$order_code,
        //     'client_id'=>
        //     'name');
        //     'mail');
        //     'mobile');
        //     'door');
        //     'street');
        //     'village_city');
        //     'postal_area');
        //     'postal_code');
        //     'confirmation_status');
        //     'verification_status');
        // ])

    



}
