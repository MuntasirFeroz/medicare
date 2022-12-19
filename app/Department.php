<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable=[
        'department_name','image','sub_title','content', 'service_features'
    ];
    protected $table='departments';
}
