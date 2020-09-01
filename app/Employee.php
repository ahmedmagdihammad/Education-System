<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    public function getUser(){
        return $this->hasOne("App\User", "userid");
    }

    public function getBranch(){
        return $this->belongsTo("App\Location", "branch");
    }

    public function getJobtitle(){
        return $this->belongsTo("App\Job", "job");
    }

    public function Department(){
        return $this->belongsTo("App\Department", "department");
    }

}
