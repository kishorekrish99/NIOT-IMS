<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainComponentLog extends Model
{
    public function subLog(){
        return $this->hasMany('App\SubComponentLog','main_log_fk');
    }
}
