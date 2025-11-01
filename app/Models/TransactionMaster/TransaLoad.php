<?php

namespace App\Models\TransactionMaster;

use Illuminate\Database\Eloquent\Model;

class TransaLoad extends Model
{
    //


    protected $table='transaction_master';

    protected $fillable=[
            'user_name',
            'user_email',
            'user_id',
            'transaction_id',
            'transaction_amount',
            'total_amount',
            'transaction_balance_amount',
            'transaction_type',      
    ];
}
