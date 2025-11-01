<?php

namespace App\Models\AdminMaster;

use Illuminate\Database\Eloquent\Model;

class LoginMaster extends Model
{
    //

    protected $table="adminmaster";

   protected $fillable = [
    'username',
    'email',
    'password',
    'mobile',
    'role'
];


    
}
