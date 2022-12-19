<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='rooms';
    protected $fillable =[
        'accomodation_id','room_no','floor_no','total_seat'
    ];

}
