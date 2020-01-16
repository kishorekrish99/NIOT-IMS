<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rfid extends Model
{
    protected $fillable = ['department_id'];
    function getDepartmentRfids(){
    	return $this->belongsTo('App/Department');
    }
}
