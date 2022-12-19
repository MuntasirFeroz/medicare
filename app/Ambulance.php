<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $table='ambulances';
    protected $fillable =[
        'name','type','registration_no','dispatched','driver','driver_phone','cost'
    ];

}
