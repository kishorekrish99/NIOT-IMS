<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComponentLog extends Model
{
    public function mainLog(){
        return $this->belongsTo('App\MainComponentLog','main_log_fk');
    }
}
