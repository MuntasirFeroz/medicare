<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table='seats';
    protected $fillable =[
        'accomodation_id','room_id','room_no','seat_no','floor_no','occupied','booked'
    ];
}
