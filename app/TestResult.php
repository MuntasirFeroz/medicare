<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $table='test_results';
    protected $fillable =[
        'test_id','patient_name','age','sex','phone','email','test_date','result','completed'
    ];
}
