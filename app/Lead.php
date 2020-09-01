<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public $timestamps = false;

    public function getEmployee(){
        return $this->belongsTo("App\Employee", "agent");
    }
}
