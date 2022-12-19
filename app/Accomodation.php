<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    protected $table='accomodations';
    protected $fillable =[
        'name','image','cost','details'
    ];
}
