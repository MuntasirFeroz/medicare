<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
   protected $table='patients';
   protected $fillable=[
       'user_id','name','age','sex', 'phone','email','address'
    ];
}
