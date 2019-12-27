<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class track extends Model
{
    public function dept(){
    	return $this->belongsTo('App\Department','dept_id_fk');
    }
}
