<?php

namespace App\Http\Controllers\BookingLoad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BookingMaster\BookingLoad;

use Carbon\Carbon;


class BookingMaster extends Controller
{
    //

  public function index()
{
    $today = now()->setTimezone('Asia/Kolkata')->toDateString();


    $overall_data = BookingLoad::whereDate('customer_booking_date', $today)->get();

    $bookedSeats = $overall_data->pluck('customer_seat_no')->toArray();

    return view('Booking-Master.Booking_Master', [
        'overall_data' => $overall_data,
        'bookedSeats' => $bookedSeats
    ]);
}


    public function bookingData(Request $request)
    {
        $request->validate([
            'customer_name'        => 'required|string|max:255',
            'seatNoInput'          => 'required|string|max:50',
            'customer_mobile'      => 'required|string|max:20',
            'customer_booking_data' => 'required|date',
            'customer_confirm_code' => 'required|string|max:10',
        ]);

        $booking = BookingLoad::create([
            'customer_name'   => $request->customer_name,
            'customer_seat_no'         => $request->seatNoInput,
            'customer_mobile' => $request->customer_mobile,
            'customer_booking_date'    => $request->customer_booking_data,
            'customer_confirm_code'    => $request->customer_confirm_code,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Booking created successfully!'
        ]);
    }
}
