<?php

namespace App\Http\Controllers\Ecommerce;
use App\Models\Ecommerce\EcommerceModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;



use App\Models\JobportalMaster\Jobposted;


use SweetAlert2\Laravel\Swal;

class EcommerceMasters extends Controller
{

    public function productinserted(Request $request)
    {

        // dd($request->all());
        // Step 1: Validate request
        $validated = $request->validate([
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120', // 5120 KB = 5MB
            'product_name' => 'required|string|max:255',
            'product_categories' => 'required|string|max:255',
            'product_brand' => 'required|string|max:255',
            'product_stack' => 'required|string|max:255',
            'measurement' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_tax' => 'required|string|max:255',
            'product_alert' => 'required|string',
            'delivery_amount' => 'required|string',
            'product_amount' => 'required|string',
            'product_discount' => 'required|string',
            'product_total_amount' => 'required|string',
            'product_status' => 'required|string',
        ]);

        // Step 2: Generate unique IDs
        do {
            $product_id = 'PROID-' . mt_rand(100, 999);
        } while (EcommerceModel::where('product_id', $product_id)->exists());

        do {
            $product_code = 'PROCODE-' . mt_rand(1000, 9999);
        } while (EcommerceModel::where('product_code', $product_code)->exists());

        // Step 3: Prepare data array
        $data = [
            'product_id' => $product_id,
            'product_code' => $product_code,
            'product_name' => $validated['product_name'],
            'product_category' => $validated['product_categories'],
            'product_brand' => $validated['product_brand'],
            'product_stack' => $validated['product_stack'],
            'product_measurement' => $validated['measurement'],
            'product_description' => $validated['product_description'],
            'product_tax' => $validated['product_tax'],
            'product_alert' => $validated['product_alert'],
            'product_delivery_amount' => $validated['delivery_amount'],
            'product_price' => $validated['product_amount'],
            'product_discount' => $validated['product_discount'],
            'product_total_amount' => $validated['product_total_amount'],
            'product_status' => $validated['product_status'],
            'GST_Rate' => $validated['product_status'],

        ];

        // Step 4: Handle image upload
        if ($request->hasFile('product_image')) {
            try {
                $file = $request->file('product_image');
                $fileName = $product_code . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/product'), $fileName);
                $data['product_image'] = 'upload/product/' . $fileName;
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Image upload failed: ' . $e->getMessage());
            }
        } else {
            $data['product_image'] = null;
        }

        // Step 5: Insert data into the database

        try {
            EcommerceModel::create($data);
            return view('Ecommerce.Ecommerce_create')->with('success', 'Product inserted successfully!');
        } catch (\Exception $e) {
            Log::error('Insert failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Insert failed: ' . $e->getMessage());
        }



    }

    public function fetchproductdata()
    {
        $filter_product_data = Jobposted::where('job_status', '1')->paginate(5);
        return view('Ecommerce.Product_master_list', compact('filter_product_data'));
    }

    public function ajaxload(Request $request)
    {
        $query = Jobposted::query();
        if ($request->filled('product_data')) {
            $query->where('job_title', 'LIKE', '%' . $request->product_data . '%');
        }
        $filter_product_data = $query->orderBy('id', 'desc')->paginate(5);

        if ($request->ajax()) {
            return view('Ecommerce.product_table_load', compact('filter_product_data'))->render();
        }

        return view('Ecommerce.Product_master_list', compact('filter_product_data'));
    }

    public function loadModalProduct(Request $request)
    {
        $get_id = $request->input('product_id');

        $fetch_all_data = EcommerceModel::findOrFail($get_id);


        $html = "
   <table class='table align-middle mb-0 table-hover table-centered'>
        <thead class='bg-light-subtle'>
           
   <tr><td><b>Product ID:</b></td><td> {$fetch_all_data->product_id}</td></tr>
   <tr><td><b>Product Code:</b></td><td> {$fetch_all_data->product_code}</td></tr>
   <tr><td><b>Product Name:</b></td><td> {$fetch_all_data->product_name}</td></tr>
   <tr><td><b>Product Brand:</b></td><td> {$fetch_all_data->product_brand}</td></tr>
   <tr><td><b>Product Category:</b></td><td> {$fetch_all_data->product_category}</td></tr>
   <tr><td><b>Product Stack:</b></td><td> {$fetch_all_data->product_stack}</td></tr>
   <tr><td><b>Product DeliverY:</b></td><td> {$fetch_all_data->product_delivery_amount}</td></tr>
   <tr><td><b>Product Price:</b></td><td> {$fetch_all_data->product_price}</td></tr>
   <tr><td><b>Product Discount:</b></td><td> {$fetch_all_data->produc_discount}</td></tr>
   <tr><td><b>Product GST:</b></td><td> {$fetch_all_data->product_tax}</td></tr>
   <tr><td><b>Product Total Amount:</b></td><td> {$fetch_all_data->product_total_amount}</td></tr>
  
    <tr><td>Image</td><td><img src='" . asset($fetch_all_data->product_image) . "' width='100'></td></tr>
    </thead>
    </table>
";

        return response($html, 200);
    }

    public function productEditdata(Request $request, $id)
    {
        $master_data = Jobposted::findOrFail($id);

        return view('Ecommerce.Product-edit-master', compact('master_data'));


    }


    public function FrontendProductload(Request $request)
    {
        $Master_product_data = EcommerceModel::where('product_status', 1)->get();

        return view('Front-End.index', compact('Master_product_data'));
    }


    public function editproductmaster(Request $request, $id)
    {
        $edit_product_data = [];


        $product_editable_data = Jobposted::findOrFail($id);

        // Merge in other fields
        $edit_product_data = array_merge($edit_product_data, [
            'job_title' => $request->job_title,
            'job_description' => $request->job_descrition,
            'job_location' => $request->Location,
            'job_category' => $request->Category,
            'job_skill' => $request->skill,
            'salary' => $request->salary,
        ]);

        $product_editable_data->update($edit_product_data);

        $filter_product_data = Jobposted::orderBy('id', 'asc')->paginate(5);
       

         return view('Ecommerce.Product_master_list', compact('filter_product_data'));
    }


public function productdelete(Request $request, $id)
{
   
    $jobPost = Jobposted::findOrFail($id);

   
    $jobPost->update(['job_status' => 3]);

    
   $filter_product_data = Jobposted::where('job_status', '1')->paginate(5);
        return view('Ecommerce.Product_master_list', compact('filter_product_data'));
}






}






