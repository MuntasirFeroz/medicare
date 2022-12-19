<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $table='room_bookings';
    protected $fillable =[
        'accomodation_id','room_id','seat_id','room_no','seat_no',
        'cost','booking_date','entry_time','patient','phone','email'
    ];
}
