<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrentStatus extends Model
{
    protected $table = "current_status";
    public $timestamps = false;
    protected $primaryKey = 'rfid_id';
    protected $fillable = ['rfid_id','log_id'];
}
