<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    public $timestamps = false;

    public function getTrack(){
        return $this->belongsTo("App\Track", "track");
    }
}
