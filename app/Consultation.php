<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table='consultations';
    protected $fillable =[
        'doctor_id','department_id','schedule_id','schedule_no','status','patient','phone','email','consultation_date'
    ];
}
