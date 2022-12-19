<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmbulanceBooking extends Model
{
    protected $table='ambulance_bookings';
    protected $fillable =[
        'ambulance_id','booking_date','patient','phone','email','address'
    ];

}
