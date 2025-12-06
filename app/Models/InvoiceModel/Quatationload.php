<?php

namespace App\Models\InvoiceModel;

use Illuminate\Database\Eloquent\Model;

class Quatationload extends Model
{
    //

    protected $table = "quotation_master";

    protected $fillable = [

        'quatation_id',
        'service_provide',
        'end_date',
        'organization',
        'quatation_amount',
        'quatation_status',
        'verification_status',
    ];

    public function services()
{
    return $this->hasMany(Quatationload::class, 'quatation_id', 'quatation_id');
}

}
