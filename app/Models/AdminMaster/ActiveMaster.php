<?php

namespace App\Models\AdminMaster;

use Illuminate\Database\Eloquent\Model;

class ActiveMaster extends Model
{
    //

    protected $table="active_usermaster";

    protected $fillable=[
        'email',
        'username',
        'active_status'
    ];
}
