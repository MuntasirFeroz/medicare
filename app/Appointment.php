<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table='appointments';

    protected $fillable=[
        'department_id','doctor_id','prescription_id','patient_name','phone','email','appointment_date',
        'appointment_time','message','status','canceled','completed'
    ];
}
