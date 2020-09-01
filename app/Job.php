<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    public function getDepartment(){
        return $this->belongsTo("App\Department", "department");
    }
}
