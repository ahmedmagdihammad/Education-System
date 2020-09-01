<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public function getTrack(){
        return $this->belongsTo("App\Track", "track");
    }

    public function getBranch(){
        return $this->belongsTo("App\Location", "location");
    }

}
