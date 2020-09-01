<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;

    public function getLocation(){
        return $this->belongsTo("App\Location", "location");
    }

    public function getLevel(){
        return $this->belongsTo("App\Level", "level");
    }

    public function getTime(){
        return $this->belongsTo("App\Time", "time");
    }

    public function getTrack(){
        return $this->belongsTo("App\Track", "track");
    }

    public function getBatch(){
        return $this->belongsTo("App\Batche", "batch");
    }

    public function getTeacher(){
        return $this->belongsTo("App\Employee", "teacher");
    }
}
