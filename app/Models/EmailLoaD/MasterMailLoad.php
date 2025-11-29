<?php

namespace App\Models\EmailLoaD;

use Illuminate\Database\Eloquent\Model;

class MasterMailLoad extends Model
{
    //

    protected $table="email_alert_master";

   protected $fillable = [
    'send_email',
    'to_email',
    'cc_email',
    'message',
    'view_notification',
    'delivery_date',
    'verification_status'
];

}
