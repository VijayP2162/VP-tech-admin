<?php

namespace App\Models\BookingMaster;

use Illuminate\Database\Eloquent\Model;

class BookingLoad extends Model
{
    //

    protected $table='booking_master';

    protected $fillable = [
        'customer_name',
        'customer_seat_no',
        'customer_mobile',
        'customer_booking_date',
        'customer_confirm_code',
       
    ];
}
