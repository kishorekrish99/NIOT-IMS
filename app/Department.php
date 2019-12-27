<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function trackLogs(){
    	return $this->hasMay('App\track','dept_id_fk');
    }
}
