<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table='prescriptions';
    protected $fillable=[
        'patient_id','doctor_id','department_id','appointment_id','appointment_date','diagnosis'
    ];
}
