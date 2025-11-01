<?php

namespace App\Http\Controllers\JobPortal;





use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobportalMaster\Location;

use App\Models\JobportalMaster\Jobposted;

use App\Models\JobportalMaster\jobappledMaster;

class JobportalMaster extends Controller
{
    public function locationload(Request $request)
    {




        $locationInserted = Location::create([
            'location_id' => '1',
            'location_name' => $request->location_name,
            'location_status' => '1'
        ]);

        return view('jobportal.location');
    }

    public function locationform(Request $request)
    {
        $all_location = Location::all();
        return view('jobportal.jobpost', compact('all_location'));
    }

    public function inseredjobpost(Request $request)
    {

        $all_location = Location::all();



        $jobpostedinsetred = Jobposted::create([
            'job_title' => $request->job_title,
            'job_description' => $request->job_descrition,
            'job_location' => $request->Location,
            'job_category' => $request->Category,
            'job_skill' => $request->skill,
            'salary' => $request->salary,
            'job_status' => 1
        ]);


        return view('jobportal.jobpost', compact('all_location'));
    }

    public function jobaply(Request $request, $id)
    {

        $masterdata = Jobposted::findOrFail($id);

        return view('jobportal.jobApply', compact('masterdata'));
    }

 public function laodjobapply(Request $request)
{
    $appleddata = jobappledMaster::create([
        'candidate_name'      => $request->candidate_name,
        'candidate_email'     => $request->candidate_email,
        'candidate_mobile'    => $request->candidate_mobile,
        'candidate_experience'=> $request->candidate_ex,
        'job_id'              => $request->job_id,
        'candidate_status'     => '1'
    ]); // <- ] closes the array, then ); ends create call

    $filter_product_data = jobappledMaster::where('candidate_status', '1')->get();

    return view('jobportal.jobapplied_list', compact('filter_product_data'));
}


public function fetchmaster(Request $request)
{
    $filter_product_data = jobappledMaster::where('candidate_status', '1')
        ->with('jobposted')  
        ->paginate(10);

    return view('jobportal.jobapplied_list', compact('filter_product_data'));
}





}
