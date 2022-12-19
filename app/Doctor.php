<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=[
        'user_id','department_id','name','title','email','salary'
    ];
    protected $table='doctors';

    // public function user(){
    //     // return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    //     return $this->belongsTo(User::class);
    // }
}
